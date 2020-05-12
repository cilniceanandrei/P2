<?php

namespace App\Controller;

use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends AbstractController
{
    public function getIndex() {
        $posts = $this->getDoctrine()->getRepository(Post::class)->findAll();

        return $this->render('blog/index.html.twig', ['posts' => $posts]);
    }

    public function getPostPage($id) {
        $post = $this->getDoctrine()->getRepository(Post::class)->find($id);

        return $this->render('blog/post.html.twig', ['post' => $post]);
    }

    public function getNewPost(Request $request) {
        $newPostForm = $this->createFormBuilder()
            ->add('post_title', TextType::class, ['label' => 'Titlu'])
            ->add('post_content', TextareaType::class, ['label' => 'Continut'])
            ->add('submit', SubmitType::class, ['label' => 'Posteaza articolul'])
            ->getForm();

        $newPostForm->handleRequest($request);

        if( $newPostForm->isSubmitted() && $newPostForm->isValid() ) {

            $formData = $newPostForm->getData();
            $post = new Post();

            $entityManager = $this->getDoctrine()->getManager();
            $post->setPostTitle($formData['post_title']);
            $post->setPostContent($formData['post_content']);
            $post->setPostAuthor('Guest');
            $post->setPostDate(new \DateTime());
            $post->setPostLastModified(new \DateTime());
            $entityManager->persist($post);
            $entityManager->flush();

            return $this->redirectToRoute('blog_first_page');

        }

        return $this->render('blog/new_post.html.twig',
            ['newPostForm' => $newPostForm->createView()]);
    }

    public function getEditPost(Request $request, $id) {
        $post = $this->getDoctrine()->getRepository(Post::class)->find($id);

        $editPostForm = $this->createFormBuilder()
            ->add('post_title', TextType::class, ['label' => 'Titlu', 'data' => $post->getPostTitle()])
            ->add('post_content', TextareaType::class, ['label' => 'Continut', 'data' => $post->getPostContent()])
            ->add('submit', SubmitType::class, ['label' => 'Salveaza articolul'])
            ->getForm();

        $editPostForm->handleRequest($request);

        if( $editPostForm->isSubmitted() && $editPostForm->isValid() ) {
            $entityManager = $this->getDoctrine()->getManager();
            $formData = $editPostForm->getData();
            $post->setPostTitle($formData['post_title']);
            $post->setPostContent($formData['post_content']);
            $post->setPostAuthor('Guest');
            $post->setPostLastModified(new \DateTime());
            $entityManager->persist($post);
            $entityManager->flush();

            return $this->redirectToRoute('blog_first_page');
        }

        return $this->render('blog/edit_post.html.twig',
            ['editPostForm' => $editPostForm->createView()]);
    }

    public function postDeletePost($id) {
        $entityManager = $this->getDoctrine()->getManager();
        $post = $this->getDoctrine()->getRepository(Post::class)->find($id);
        $entityManager->remove($post);
        $entityManager->flush();

        return $this->redirectToRoute('blog_first_page');
    }
}

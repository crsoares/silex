<?php
//echo __DIR__;die;
require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require_once 'bootstrap.php';

$app->get('/ola/{nome}', function($nome) use($app, $em) {
	return $app['twig']->render('ola.twig', array('nome'=>$nome));
});

$app->post('/cadastrar', function(Silex\Application $app, Request $request) use($em) {
	$data = $request->request->all();
	
	$post = new \SON\Entity\Post;
	$post->setTitulo($data['titulo']);
	$post->setConteudo($data['conteudo']);
	
	$em->persist($post);
	$em->flush();
	
	if($post->getId()){
		return $app->redirect($app['url_generator']->generate('sucesso'));
	}
	else{
		$app->abort(500, 'Erro de processamento');
	}
})->bind('cadastrar');

$app->get('/sucesso', function() use($app) {
	return $app['twig']->render('sucesso.twig', array());
})->bind('sucesso');

$app->run();


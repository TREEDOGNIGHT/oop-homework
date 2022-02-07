<?php

/*
Plugin Name: Create new posts
Description: Adapter pattern -- create new post
Version: 0.0.1
*/

class BlogPostPublisher
{
    public $wp;

    public function __construct(WordPressInterface $wp)
    {
        $this->wp = $wp;
    }

    public function addBlogPost($title, $post_body)
    {
        // (This is just a silly example. WordPress doesn't work like this, you can just use the XML-RPC protocol to do it in one request.
        $this->wp->login();
        $this->wp->setToMaintenanceMode(); // again, not a thing to do in WP but just for this example<br>
        $this->wp->post($title, $post_body);
        // done!
    }

    public function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

interface WordPressInterface
{
    public function login();

    public function setToMaintenanceMode();

    public function post($title, $post_body);
}

class WordPressPublisher implements WordPressInterface
{
    private $loginCredentials;

    public function login()
    {
        // login with WP
        $this->loginCredentials = WPLibrary::login('admin', '123456');
    }

    public function setToMaintenanceMode()
    {
        // now you are logged in, set it to maintenance mode (not really a think in WP!)
        WPLibrary::setToMaintenanceMode($this->loginCredentials);
    }

    public function post($title, $post_body)
    {
        // and finally send the actual post to the blog
        // this should return the HTML of the blog post
        return WPLibrary::post($this->loginCredentials, $title, $post_body);
    }
}

// $poster = new BlogPostPublisher(new WordPressPublisher());
// $poster->addBlogPost("Hello, world", "Welcome to my blog post");

add_action('plugins_loaded', function () {

    $poster = new BlogPostPublisher(new WordPressPublisher());
    $poster->addBlogPost("TEST TITLE", $poster->generateRandomString(100));

});

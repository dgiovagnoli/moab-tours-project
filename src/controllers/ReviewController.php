<?php
namespace Project\controllers;

use duncan3dc\Laravel\BladeInstance;
use Project\models\Review;
use Project\Validation\Validator;
use Project\Auth\LoggedIn;

class ReviewController extends BaseController
{
  public function getShowReviews()
  {
    $reviews = Review::all();

    echo $this->blade->render('reviews', [
      'reviews'=> $reviews
    ]);
  }






  public function getShowAdd()
  {
    echo $this->blade->render('add-review');
  }

  public function postShowAdd()
  {

    $errors = [];

    $validation_data = [
      'title' => 'min:3',
      'review' => 'min:10',

    ];

    // validate data
    $validator = new Validator();

    $errors = $validator->isValid($validation_data);

    // if validation fails, go back to register
    // page and display error message

    if (sizeof($errors) > 0)
    {
        $_SESSION['msg'] = $errors;
        echo $this->blade->render('add-review');
        unset($_SESSION['msg']);
        exit();

        //unset($_SESSION['msg']);
        //exit();
    }

    $firstname = LoggedIn::user()->first_name;
    $lastname = LoggedIn::user()->last_name;
    $fullname = $firstname . " " . $lastname;

    $review = new Review;
    $review->title = $_REQUEST['title'];
    $review->review = $_REQUEST['review'];
    $review->user_id = LoggedIn::user()->id;
    $review->fullname = $fullname;
    $review->save();

    header("Location: /review-saved");
    exit();


  }



}

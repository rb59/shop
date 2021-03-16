<?php
require_once 'Models/Rating.php';
class RatingController extends Controller
{
    public function getRating($params)
    {
        $product = $params['id'];
        $rating = new Rating();
        $rating->setProduct($product);
        $rating->getRating();
    }

    public function rate($params)
    {
        if(!isset($_SESSION['id']))
        {
            echo "<script type=\"text/javascript\">location.href = '". PATH ."/login';</script>";
            exit;
        }
        $rate = $this->getPost('rating');
        $product = $params['id'];
        $user = $_SESSION['id'];
        $rating = new Rating();
        $rating->setProduct($product);
        $rating->setUser($user);
        $rating->setRate($rate);
        $rating->rate();
    }
}
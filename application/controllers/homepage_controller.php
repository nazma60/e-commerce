<?php

class Homepage_controller extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('category');
        $this->load->model('shopping_model');
        $this->load->model('recommend_model');

    }

    public function index()
    {
        if ($this->session->userdata('logged_in')) {
            redirect('homepage_controller/user_loggedin');
        } else {
            $result['data'] = $this->category->get_category_list();
            $result['product'] = $this->shopping_model->get_product_list_array();
            $result['image_item'] = $this->shopping_model->get_images_list();
            $result['brands'] = $this->shopping_model->get_brand_list();
            $result['logged_in'] = 'no';

            $result['title'] = "Home | Voguish-villa";
            $this->load->view('header', $result);
            $this->load->view('home');
            $this->load->view('footer');
        }
    }

    public function user_loggedin()
    {
        $result['user_id'] = $this->session->userdata('user_id');
        $result['name'] = $this->session->userdata('username');
        $result['logged_in'] = $this->session->userdata('logged_in');
        $result['data'] = $this->category->get_category_list();
        $result['product'] = $this->shopping_model->get_product_list_array();
        $result['image_item'] = $this->shopping_model->get_images_list();
        $result['brands'] = $this->shopping_model->get_brand_list();
        $result['title'] = "Home | Voguish-villa";

        $temp = $this->recommend_model->getData();

        $customer = $this->recommend_model->getCustomer();
        $product = $this->recommend_model->getProduct();

        $myArray = array();



        foreach( $customer as $customertemp)
        {
            $key1 = $customertemp['user_id'];

            $res = array();


            foreach($temp as $buy)

            {

                if($buy['customer_id'] ==  $customertemp['user_id'])
                {
                    array_push($res,$buy['product_id']);

                }

            }

            foreach($product as $producttemp)
            {

                $key2 = $producttemp['id'];

                $flag = false;

                foreach($res as $restemp)
                {
                    if($producttemp['id'] == $restemp)
                    {

                        $flag = true;
                    }

                }

                if ($flag)
                {

                    $myArray[$key1][$key2] = 1;

                }
                else
                {
                    $myArray[$key1][$key2] = 0;

                }

            }

        }


        $myArrayTrans = array();

        foreach($myArray as $key => $submyArray) {
            foreach ($submyArray as $subkey => $subvalue) {
                $myArrayTrans[$subkey][$key] = $subvalue; }
        }

        $myResult = array();

        foreach($myArrayTrans as $keyi => $myArrayTransTemp)
        {
          // print_r($keyi);

            foreach($myArray[1] as $keyj => $myArrayTemp)
            {

                $total = 0;

                foreach($myArrayTrans[1] as $keyk => $myArrayTrans1temp) {

                    $total = $total + $myArrayTrans[$keyi][$keyk] * $myArray[$keyk][$keyj];

                }
                $myResult[$keyi][$keyj] = $total;
            }
        }

       // print_r(count($myArrayTrans));

  /*
        for($i = 1; $i<=count($myArrayTrans ); $i++) {
            for ($j = 1; $j <= count($myArray[1]); $j++) {

                $total = 0;

                for ($k = 1; $k <= count($myArrayTrans[1]); $k++) {

                    if (count($myArrayTrans[$i][$k] > 0) && count($myArray[$k][$j]) > 0) {
                        //      $total = $total + $myArrayTrans[$i][$k] * $myArray[$k][$j];

                    }
                    //  $myResult[$i][$j] = $total;

                }
            }

        }
        */
$final = array();

$user = array();


foreach($product as $productTemp)
{
    $user[$productTemp['id']] = 0;
}

// print_r($product);
// print_r($user);


foreach($temp as $tempuser)
{

    if($tempuser['customer_id'] == $result['user_id'])
    {
        $user[$tempuser['product_id']] = 1;
    }

}


foreach($myResult as $keyi => $myResultTemp)
{

    $total = 0;

    foreach($myResult[1] as $keyk => $myResult1Temp)
    {
        $total = $total + $myResult[$keyi][$keyk] * $user[$keyk];
    }

    $final[$keyi] = $total;
}

        //print_r($final);
/*
        for($i=1; $i<=count($myResult);$i++)
        {

            $total = 0;

            for($k = 1; $k<=count($myResult[1]); $k++)
            {
                $total = $total + $myResult[$i][$k] * $user[$k];
            }

            $final[$i] = $total;
        }*/

$result['recommended'] = array();

        foreach($final as $key => $finalTemp)
        {
            if(($user[$key] - $final[$key])<0 && $user[$key] == 0)
            {
                $result['recommended'][] = $key;
            }
        }



//rating recommendation
$current_user = $result['user_id'];

$resultLast = array();


//print_r($result['recommended']);die;
foreach($product as $producttemp)
{


    $itemID = $producttemp['id'];
    $userID = $current_user;

    $denom = 0.0;
    $numer = 0.0;

    $k = $itemID;


    $db_result = $this->recommend_model->getdbResult($userID, $itemID);


    foreach($db_result as $row)
    {

        $j = $row['itemID'];
        $ratingValue = $row['ratingValue'];

        $count_result = $this->recommend_model->getCountResult($k, $j);

        $count=0;


        foreach($count_result as $tempCount)
        {
            $count++;
        }


        if($count > 0)
        {

            $count = $tempCount['count'];
            $sum = $tempCount['sum'];

            $average = $sum / $count;

            $denom += $count;
            $numer += $count * ($average + $ratingValue);


        }


    }

    if($denom == 0)
    {
        //  $ratingResult[] = 0;
    }

    else {
        //  $ratingResult[] = $numer / $denom;
        $resultLast[] = $producttemp['id'];
    }
}


//to get the user rating relationship of currnet user

$tempGetRating = $this->recommend_model->getUserRating($current_user);

$finalRatingRecom = array();

//        print_r($result);

foreach($resultLast as $tempResult)
{
    $flag = true;

    foreach($tempGetRating as $temp2)
    {
        if($temp2['product_id'] == $tempResult)
        {
            $flag = false;
        }
    }

    foreach($temp as $temp3)

    {
        if($temp3['customer_id'] == $current_user && $temp3['product_id'] == $tempResult)
        {
            $flag = false;
        }
    }

    if($flag)
    {
        $result['recommended'][] = $tempResult;
    }

}




//  print_r( $result['ratingResult']);


/*
        foreach($ratingResult as $ratingResultTemp)
        {
            $flag = false;

            foreach($result['recommended'] as $resultTemp)
            {
                if($ratingResultTemp == $resultTemp)
                {
                    $flag = true;
                }
            }

            if(!$flag)
            {
                $result['recommended'][] = $ratingResultTemp;
            }
        }
*/

//    print_r($ratingResult );

//print_r(  $result['recommended']);die;

$this->load->view('header', $result);
$this->load->view('home');
$this->load->view('footer');


}


}
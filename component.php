<?php

function component($productname, $productprice, $productimg, $productid){
    $element = "
    
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
                <form action=\"newhp.php\" method=\"post\">
                    <div class=\"card shadow\" style=\"background-color: white\">>
                        <div>
                            <img src=./Admin/uploaded_img/".$productimg." alt=\"Image1\" class=\"img-fluid card-img-top\">
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">$productname</h5>
                            <h6>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"far fa-star\"></i>
                            </h6>
                            <p class=\"card-text\">
                            </p>
                            <h5>
                                <small><s class=\"text-secondary\"></s></small>
                                <span class=\"price\">₹$productprice</span>
                            </h5>
                            <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i>
                             <input type='hidden' name='product_id' value='$productid'></button>
                        </div>
                    </div>
                </form>
            </div>
    ";
    echo $element;
}

function cartElement($productimg, $productname, $productprice, $productid){
    $element = "
    
    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=./Admin/uploaded_img/".$productimg." alt=\"Image1\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\" style=\" padding-top:20px;\">
                                <h5 class=\"pt-2\">$productname</h5>
                                <p class=\"text-secondary\">Seller: AgriShop</p>
                                <h5 class=\"pt-2\">₹$productprice</h5>
                                <button type=\"submit\" class=\"btn btn-warning\">Save for Later</button>
                                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                            </div>
                            <div class=\"col-md-3 py-5\">
                                <div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
    
    ";
    echo  $element;
}

function OrderElement($productimg, $productname, $productprice, $productid){
    $element = "
    
    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=./Admin/uploaded_img/".$productimg." alt=\"Image1\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\" style=\" padding-top:20px;\">
                                <h5 class=\"pt-2\">$productname</h5>
                                <p class=\"text-secondary\">Seller: AgriShop</p>
                                <h5 class=\"pt-2\">₹$productprice</h5>
                            </div>
                            <div class=\"col-md-3 py-5\">
                                <div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
    
    ";
    echo  $element;
}

// <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-minus\"></i></button>
//                                     <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
//                                     <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-plus\"></i></button>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <!-- <link rel="stylesheet" href="css/cart.css" /> -->
    <script src="js/store.js" ></script>

    <title>Pizzeria</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><h2>Pizzeria🍕</h2></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link text-white" aria-current="page" href="menu.php"
              >Menu</a
            >
            <a class="nav-link text-white" href="cart.php">Cart</a>
            <!-- <a class="nav-link text-white" href="#">Pricing</a> -->
            <!-- <a class="nav-link text-white">Disabled</a> -->
            <div class="d-grid gap-2 d-md-block">
              <button
                class="btn btn-warning text-decoration-none"
                type="button"
              >
                <a href="login.php">Log-In</a>
              </button>
              <button class="btn btn-danger text-decoration-none" type="button">
                <a href="sign-up.php">Sign-Up</a>
              </button>
            </div>
          </div>
        </div>
      </div>
    </nav>


    <!-- <section-1> -->
      <!-- <div class="cart">
        <div class="cart-header">
          <h3 class="cart-heading">Shopping Cart</h3>
          <button class="btn btn-warning" type="submit">Remove All</button>
        </div>
      </div> -->

        <!-- <div class="Cart-Item">
          <div class="image-box"> -->
            <!-- <img src="img/" /> -->
          <!-- </div> -->
          <!-- <div class="about">
            <h1 class="title"></h1>
            <h3 class="subtitle"></h3> -->
            <!-- <img src="img/" /> -->
          <!-- </div>
          <div class="”counter”"></div>
          <div class="”prices”"></div>
        </div> -->
        
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center border rounded bg-light">
                    <h1>cart</h1>
                </div>
                <br><br>
                <div class="col-lg-9">
                    <table class="table">
                        <thead class="text-center">
                          <tr>
                            <th scope="col">Sr No.</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total price</th>
                            <th scope="col">Remove</th>
                          </tr>
                        </thead>
                        <tbody class="text-center">
                        <?php 
                        // <!-- $total=0; -->
                        if(isset($_SESSION['cart']))
                        {
                            foreach($_SESSION['cart'] as $key => $value)
                            {
                                
                                $sr=$key+1;
                                                     
                                $tprice=$value['Price'];
                                $tquantity=$value['Quantity'];
                                
                                echo "
                                <tr>
                                    <td>$sr</td>
                                    <td>$value[Item_Name]</td>
                                    <td>$value[Price]<input type='hidden' name='tprice' class='iprice' value='$value[Price]'></td>
                                    <td><input type='number' class='text-center iquantity' onchange='subTotal()' min='1' max='10' value='$value[Quantity]'>
                                    
                                    </td>
                                    <td class='itotal'>
                                    
                                    

                                    </td>

                                    <td>
                                    
                                    <form action='manage_cart.php' method='post'>
                                    <button name='Remove_Item' class='btn btn-sm btn-outline-danger'>Remove</button>
                                    <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
                                    </form>

                                    </td>
                                </tr>
                                ";
                            }
                        }
                        ?>
                        </tbody>
                      </table>
                </div>

                <div class="col-lg-3">
                    <div class="border bg-light rounded p-4">
                    <h4>Total: </h4>
                    
                    <form action="payscript.php" method="post">

                        <h5>
                            <input id="gtotal" name="gtotal">
                        </h5>
                        
                        <input type="hidden" name="gtt" value="<?php echo $gtt; ?>" id="gtt">
                        <button type="submit" class="btn btn-primary btn-block">Pay Now</button>

                    </form>
                </div>
                </div>
            </div>
        </div>
        <form action="inv.php" method="post">

<input type="hidden" id="Item_Name" name="Item_Name">
<input type="hidden" id="amount" name="amount" value="">

<input type="hidden" name="gtt" value="<?php echo $gtt; ?>" id="gtt">
<input type="submit" value="inovice">

</form>  
      
    <!-- </section-1> -->

    <div class="container bg">
      <div class="container">
        <footer class="py-3 my-4 bg-dark">
          <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item">
              <a href="#" class="nav-link px-2 text-white">Home</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link px-2 text-white">Features</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link px-2 text-white">Pricing</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link px-2 text-white">FAQs</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link px-2 text-white">About</a>
            </li>
          </ul>
          <p class="text-center text-white text-">&copy;Pizzeria🍕</p>
        </footer>
      </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var t=0;
        var iprice=document.getElementsByClassName('iprice');
        var iquantity=document.getElementsByClassName('iquantity');
        var itotal=document.getElementsByClassName('itotal');
        var total=document.getElementById('gtotal');

        function subTotal()
        {
            t=0;
            for(i=0;i<iprice.length;i++)
            {   
                itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
                t=t+(iprice[i].value)*(iquantity[i].value);
                
            }
            document.getElementById("gtotal").value = t;   
        }


        subTotal();
    </script> 
  </body>
</html>

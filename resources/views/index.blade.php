<!doctype html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
 <body>
 <div class='container'>
 <div class='row'>
 <div class='col-md-12'>
   <form method='post' action='/save'>

     <!-- Message -->
     @if(Session::has('message'))
       <p class='alert alert-primary' style='margin-top:10px;'>{{ Session::get('message') }}</p>
     @endif

     <!-- Add/List records -->
     <table class='table border'  style='border-collapse: collapse; border-color:#efefef!important; margin:20px 10px;'>
       <tr>
         <th>Product ID</th>
         <th>Product Name</th>
         <th>Product Description</th>
         <th>Product Category</th>
         <th></th>
       </tr>
       <tr>
         <td colspan="5">{{ csrf_field() }}</td>
       </tr>
       <!-- Add -->
       <tr>
         <td><input class="form-control" type='number' name='product_id'></td>
         <td><input class="form-control" type='text' name='name'></td>
         <td><input class="form-control" type='text' name='product_desc'></td>
         <td>
            <div class="dropdown">
                <button class="form-control dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Categories
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach($productData['data'] as $product)
                <option class="dropdown-item" >{{ $product->product_id }}</option>
                @endforeach
                </div>
            </div>
        </td>
         <td><input class="btn btn-primary" type='submit' name='submit' value='Add'></td>
       </tr>

       <!-- List -->
       @foreach($productData['data'] as $product)
       <tr>
         <td>{{ $product->product_id }}</td>
         <td>{{ $product->name }}</td>
         <td>{{ $product->product_desc }}</td>
         <td>SOON</td>
         <td><a class="btn btn-success" href='/{{ $product->id }}'>Update</a> <a class="btn btn-danger"  href='/deleteProduct/{{ $product->id }}'>Delete</a></td>
       </tr>
       @endforeach
    </table>
  </form>

  <!-- Edit -->
  @if($productData['edit'])
  <form method='post' action='/save'>
   <table class='table'>
     <tr>
       <td colspan='2'><h1>Edit record</h1></td>
     </tr>
     <tr>
       <td colspan="2">{{ csrf_field() }}</td>
     </tr>
     <tr>
       <td>ID</td>
       <td><input class="form-control" type='text' name='uname' readonly value='{{ $productData["editData"]->product_id }}' ></td>
     </tr>
     <tr>
       <td>Product Name</td>
       <td><input class="form-control" type='text' name='name' value='{{ $productData["editData"]->name }}'></td>
     </tr> 
     <tr>
       <td>Product Describtion</td>
       <td><input class="form-control" type='text' name='product_desc' value='{{ $productData["editData"]->product_desc }}' ></td>
     </tr>
     <tr>
       <td>&nbsp;<input class="form-control" type='hidden' value='{{ $productData["edit"] }}' name='editid'></td>
       <td><input class="btn btn-primary" type='submit' name='submit' value='Submit'></td>
     </tr>
   </table>
  </form>
  @endif
  </div></div></div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

 </body>
</html>
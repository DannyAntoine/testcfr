
@extends('dashboard-layout')

@section('title','Dashboard')

@section('content')

<div class="content-body">
            
                  
<div class="container-fluid">






                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <p class="mb-0">Central Furniture Rescue</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                        <button type="button" class="btn btn-rounded btn-info"  data-toggle="modal" data-target="#AddProductModel" ><span
                                        class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i>
                                    </span>Add Product</button>
                        </ol>
                    </div>
                </div>
                <!-- row -->

            


                <div class="modal fade" id="AddProductModel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Product </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                
            <form action ="{{ route('product.add') }}" method="POST">
                            @csrf                           

                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label>Product Name </label>
                                                                    <input type="text" name="Product_name" class="form-control" required>
                                                                </div>
                                                                
                                                                <div class="form-group col-md-6">
                                                                    <label>Qty</label>
                                                                    <input type="number" name="Qty" class="form-control" required>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label>Description</label>
                                                                <input type="text" placeholder="Add product description" name="Description" class="form-control">
                                                            </div>

                                                            <div class="form-row">

                                                                 <div class="form-group col-md-6">
                                                                <label>Category</label>
                                                                <input type="text" placeholder="bedroom" class="form-control" name="Category"  title="" required>
                                                                </div>

                                                               <div class="form-group col-md-6">
                                                                <label>Product Type</label>
                                                                <input type="text" placeholder="brown queen size bed" name="Product_type" class="form-control"  title="" required>
                                                               </div>
                                                            </div>

                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label>Avaliability </label>
                                                                    <input type="text" class="form-control" name="Avaliability" required>
                                                                </div>
                                                                

                                                                <div class="form-group col-md-6">
                                                                    <label>SKU</label>
                                                                    <input type="text" class="form-control" name="SKU"   >
                                                                </div>
                                                            </div>


                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label>Monetary Value $ </label>
                                                                    <input type="text" class="form-control" name="MonetaryValue" required>
                                                                </div>
                                                                

                                                                <div class="form-group col-md-6">
                                                                    <label>Donated Value $</label>
                                                                    <input type="text" class="form-control" name="Donatedvalue"   required>
                                                                </div>
                                                            </div>
                                                           
                                                           
                                                       

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Product</button>
            </div>
        </div>
         </form>
    </div>
</div>


                <div class="row">
                    <div class="col-12">
                        <div class="card">

                       

                            <div class="card-header">
                                <h4 class="card-title">Update Inventory </h4>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>SKU</th>
                                                <th>Product Name</th>
                                                <th>Qty</th>
                                                <th>Category</th>
                                                <th>Product Type </th>
                                                <th>Description </th>
                                                <th>Avaliability</th>
                                                <th> Monetary Value $</th>
                                                <th> Donated Value $</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       
                                         @foreach($listInventoryData as $lid)
                                            <tr>
                                                <td>{{$lid-> sku }}</td>
                                                <td>{{$lid -> product_name}}</td>
                                                <td>{{$lid -> qty}}</td>
                                                <td>{{$lid -> product_category}}</td>
                                                <td>{{$lid -> product_type}}</td>
                                                <td>{{$lid -> product_description}} </td>
                                                <td>{{$lid -> avaliability}}</td>
                                                <td>{{$lid -> monetary_value}}</td>
                                                <td>{{$lid -> donated_value}} </td>

                                                <td> <div class="btn-group mb-2 btn-group-sm">
                                    <button class="btn btn-primary" type="button">Update</button>
                                    <button class="btn btn-danger" type="button">delete</button>
                                    
                                </div></td>
                                    

                                            </tr>
                                         @endforeach
                                      
                                            
                                           
                                         
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            <th>SKU</th>
                                                <th>Product Name</th>
                                                <th>Qty</th>
                                                <th>Category</th>
                                                <th>Product Type </th>
                                                <th>Description </th>
                                                <th>Avaliability</th>
                                                <th> Monetary Value $</th>
                                                <th> Donated Value $</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>

<script src="3.6.3jquery.min.js"></script>
    <script src="global.min.js"></script>
    <script src="quixnav-init.js"></script>
   
    


    <!-- Datatable -->
    <script src="jquery.dataTables.min.js"></script>
    
    <script src="datatables.init.js"></script>
 <script src="custom.min.js"></script>



 @endsection
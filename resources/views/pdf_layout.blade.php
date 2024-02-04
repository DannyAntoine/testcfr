<!-- pdf_layout.blade.php -->

<style>

    
  
    td, th {
       border-right:1px solid #000;
  
    }

    td:last-child, th:last-child {
      border-right:none;
    }

  .title {
    color :red; 
    top:-0;
    left:50%;
    text-align:center;
  }

  table {
   width:100%;
   
  }

  .first-child-table {
    width:100%;
  }

 

</style>
<h4 class="title"> Central Furniture Rescue  {{ now()->year }} Request Form </h4>




<!-- Table Agency Info-->

<table style ="border: 1px solid #000; border-bottom:none;">
    <thead>
    <tr>
    <th>Agency: &nbsp;  {{$agency}} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</th> 
   
    <th>Advocate:&nbsp; {{$advocatefirstName}} {{$advocatelastName}} </th>
    </tr>
    </thead>

</table>

<!-- Table Client Info -->

<table style ="border: 1px solid #000;">
    <caption> Client Info</caption>
    <thead>
    <tr>
    <th>First Name:</th>
    <th>Last Name:</th>
    <th>Referal Date:</th>
    <th>Contact Date:</th>
    <th>Closed Date:</th>
    <th>Move-In Date:</th>
    </tr>
    </thead>

    <tbody>
        <tr>
        <td>{{$headofhousehold_firstname}}</td>
        <td>{{$headofhousehold_lastname}}</td>
        <td>{{$receivedDate}}</td>
        <td>___/___/_____</td>
        <td>___/___/_____</td>
        <td>{{$MoveInDate}}</td>
        </tr>
    </tbody>


   <!--nested table  -->
   <tr>
   <td colspan = "6">
    <table class="first-child-table" style ="border: 1px solid #000; width:100%;">
    <thead>
    <tr>
    <th>Phone:</th>
    <th>Address:</th>
    </tr>
    </thead>

    <tbody>
        <tr>
        <td>{{$phone}}</td>
        <td>{{$address}} {{$address2}} {{$City}} {{$State}} {{$Zip}} </td>
        </tr>
    </tbody>

</table>
</td>
</tr>

<!--Family Demographics nested table -->

<tr>
<td colspan = "6">
<table style ="border: 1px solid #000; width:100%;">
    <thead>
    <tr>
    <th>Adults</th>
    <th>Children</th>
    </tr>
    </thead>

    <tbody>
        <tr>
        <td>
        <!-- adult table comes here-->

        <table style ="border: 1px solid #000; width:100%;">
      <thead>
     <tr>
     <th>FIRST NAME</th>
     <th>LAST NAME</th>
     <th>AGE</th>
     <th>GENDER</th>
     </tr>
     </thead>
     <tbody>
     @foreach ($adult_first_names as $key => $adult_first_name)
    <tr>
        <td>{{$adult_first_name }}</td>
        <td>{{ $adult_last_names[$key] }}</td>
        <td>{{ $adult_age[$key]}}</td>
        <td>{{ $adult_gender[$key] }}</td>
    </tr>
@endforeach
     </tbody>
     </table>
    
       </td> <!--end of  inner adult table  -->
        <td>
        <!-- Child table comes here-->
        <table style ="border: 1px solid #000; width:100%;">
      <thead>
     <tr>
     <th>FIRST NAME</th>
     <th>LAST NAME</th>
     <th>AGE</th>
     <th>GENDER</th>
     </tr>
     </thead>
     <tbody>
     @foreach ($child_first_names as $key => $child_first_name)
    <tr>
        <td>{{ $child_first_name }}</td>
        <td>{{ $child_last_names[$key] }}</td>
        <td>{{ $child_age[$key] }}</td>
        <td>{{ $child_gender[$key] }}</td>
    </tr>
@endforeach
     </tbody>
     </table>
    
       </td>
      </td> <!-- end of inner child table -->
        </tr>
    </tbody>

</table>
</td>
</tr>

</table>

<!-- request order table -->        
<br>
<table style ="border: 1px solid #000; width:100%;">
 <!-- test of single nested table  -->
 <table>
    <thead>
        <tr>
            <th>CATEGORY</th>
            <th>ITEM</th>
            <th>NEED</th>
        </tr>
    </thead>
    <tbody>
   
        <tr>
        <td rowspan="3"></td>
           
      
            <td></td>
            <td></td>
        </tr>
     
        
        </tr>
      
    </tbody>

</table>

</table>

<caption><strong>BACK ORDER</strong></caption>

<table style ="border: 1px solid #000; width:100%;">
 <!-- test of single nested table  -->
 <table>
    <thead>
        <tr>
            <th>CATEGORY</th>
            <th>ITEM</th>
            <th>NEED</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td rowspan="3">WINTER GEAR</td>
            <td> Gloves</td>
            <td> 1</td>
        </tr>
        <tr>
           
            <td> Coat</td>
            <td> 1</td>
        </tr>
        <tr>
           
            <td> Scraf</td>
            <td> 1</td>
        </tr>

    </tbody>

</table>

</table>

<h4>
By receiving furniture and/or other household goods from Central Furniture Rescue, (1) I understand that most are used, (2) agree to receive all items "AS IS" and (3)
agree to hold the Central Furniture Rescue, its volunteers,agents and donors harmless from all liability for any injury and/or Illness that might arise from use or misuse of any 
furniture or other items received by me.
</h4>

<h5>Signature : ____________________________________ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  Date: _____________________  </h5> 

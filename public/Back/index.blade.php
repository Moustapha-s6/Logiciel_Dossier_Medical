<!DOCTYPE html>
<html lang="en">


@include('Back/head')
<body>
    <div class="main-wrapper">
       @include('Back/header') 
        @include('Back/sidebar') 
        @include('Back/content')
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    
@include('Back/js')
</body>



</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
    <title>Document</title>
    <header>
        <nav>
            <h2>
                CONTACTS APP 
           </h2>
       
            <ul> 

                @guest
                <li>  
                    <form action="{{ route('get_login') }}" method="get">
                        
                        <button type="submit" class="btn btn-primary">login</button></form></li>
                <li>
                    <form action="{{ route('register') }}" method="get">
                        
                        <button type="submit" class="btn btn-primary" method="get">register</button></form>
                </li> 
                  
                    
                @endguest
                @auth
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary">logout</button></form>  
                    </li>

                    <li>
                        @csrf
                        <form action="{{ route('dashboard') }}" method="get">
                           
                            <button type="submit" class="btn btn-primary" >create new contact</button></form>

                    </li>

                    <li>
                        @csrf

                    <form action="/display" method="get">
                        <button  class="btn btn-primary">List</button></form>
                    </li>
                @endauth 
            </ul>
        </nav>
    </header>
</head>
<body>
   @guest
    <h3>Please register and login to use the app.</h3>
    @endguest

    <div class="text-allign center">
    @auth
        <h1> <pre>
            
                                                 WELCOME!!!
        
        </pre> </h1>
        @endauth
    </div>
</body>
</html>

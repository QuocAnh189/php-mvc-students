<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Falure</title>
    <style>
        .container{
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 90vh;
        }
        .box{
            background: #fdfdfd;
            display: flex;
            flex-direction: column;
            padding: 25px 25px;
            border-radius: 20px;
            box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
                        0 32px 64px -48px rgba(0,0,0,0.5);
        }
        .form-box{
            width: 450px;
            margin: 0px 10px;
        }
        .form-box header{
            font-size: 25px;
            font-weight: 600;
            padding-bottom: 10px;
            border-bottom: 1px solid #e6e6e6;
            margin-bottom: 10px;
        }
        .form-box form .field{
            display: flex;
            margin-bottom: 10px;
            flex-direction: column;

        }
        .form-box form .input input{
            height: 40px;
            width: 100%;
            font-size: 16px;
            padding: 0 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            outline: none;
        }
        .btn{
            height: 35px;
            background: rgba(76,68,182,0.808);
            border: 0;
            border-radius: 5px;
            color: #fff;
            font-size: 15px;
            cursor: pointer;
            transition: all .3s;
            margin-top: 10px;
            padding: 0px 10px;
        }
        .btn:hover{
            opacity: 0.82;
        }
        .submit{
            width: 100%;
        }
        .links{
            margin-bottom: 15px;
        }

        /********* Home *****************/

        .nav{
            background: #fff;
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            line-height: 60px;
            z-index: 100;
        }
        .logo{
            font-size: 25px;
            font-weight: 900;
            
        }
        .logo a{
            text-decoration: none;
            color: #000;
        }
        .right-links a{
            padding: 0 10px;
        }
        main{
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 60px;
        }
        .main-box{
            display: flex;
            flex-direction: column;
            width: 70%;
        }
        .main-box .top{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
        .bottom{
            width: 100%;
            margin-top: 20px;
        }
        @media only screen and (max-width:840px){
            .main-box .top{
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }
            .top .box{
                margin: 10px 10px;
            }
            .bottom{
                margin-top: 0;
            }
        }
        .message{
            text-align: center;
            background: #f9eded;
            padding: 15px 0px;
            border:1px solid #699053;
            border-radius: 5px;
            margin-bottom: 10px;
            color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <div class='message'>
                <!-- <p>This email is used, Try another One Pleasea!</p> -->
                <p><?php echo $message ?></p>
            </div>
            <br>
            <button onclick="window.history.back()" class='btn'>Go Back</button>
        </div>
    </div>
</body>
</html>
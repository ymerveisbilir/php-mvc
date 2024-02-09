
<!DOCTYPE html>
<html lang="en">

<head>
         <meta charset="UTF-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>Login Page </title>
</head>
<style>
         body {
                  font-family: Arial, sans-serif;
                  background-color: #f4f4f4;
                  margin: 0;
                  padding: 0;
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  height: 100vh;
         }

         .form-container {
                  background-color: #fff;
                  padding: 20px;
                  border-radius: 8px;
                  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                  width: 300px;
                  /* Dilediğiniz genişliği ayarlayabilirsiniz */
         }

         label {
                  display: block;
                  margin-bottom: 8px;
         }

         input {
                  width: 100%;
                  padding: 10px;
                  margin-bottom: 16px;
                  box-sizing: border-box;
                  border: 1px solid #ccc;
                  border-radius: 4px;
         }

         button {
                  background-color: #4caf50;
                  color: #fff;
                  padding: 10px 15px;
                  border: none;
                  border-radius: 4px;
                  cursor: pointer;
                  font-size: 16px;
         }

         button:hover {
                  background-color: #45a049;
         }
</style>

<body>
         <div class="form-container">

                  <form action="/proje/loginPost" method="POST">

                           <label >Email Address :</label>
                           <input type="email" id="email" name="email" required>

                           <label >Password:</label>
                           <input type="password" id="password" name="password" required>

                           <button type="submit">Login</button>
                  </form>


         </div>
</body>

</html>
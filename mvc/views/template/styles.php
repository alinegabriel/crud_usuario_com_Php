<?php
header("Content-type: text/css; charset: UTF-8");

$font_family = 'Arial, Helvetica, sans-serif';
$font_size = '0.7em';
$border = '1px solid';
?>

body {
  height: 100vh;
  background: linear-gradient(to bottom, #0047ab, #00a6cf);
  color: black;
  font-size: 18;
}

.container {
  min-width: 50vh;
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
  background-color: lightgray;
  border-radius: 10px;
  box-shadow: 0 0 0 rgba(0, 0, 0, 0.5);
}

* {
  margin: 0;
  padding: 0;
}

nav {
  background-color: indigo;
  padding: 10px 0;
  margin-bottom: 20px;
}

nav ul {
  display: flex;
  justify-content: space-around;
  list-style: none;
  padding: 0;
  margin: 0;
}

nav ul li a {
  color: wheat;
  text-decoration: none;
  padding: 10px;
  border-radius: 5px;
  transition: background-color 0.3s;
}

nav ul li a:hover {
  background-color: #600060;
}

footer {
  text-align: center;
  margin-top: 8vh;
  color: wheat;
}

h1, h2 {
  text-align: center;
}

h1 {
  color: purple;
}

h2 {
  color: #000033;
}

p {
  text-align: center;
}

.btn-dark {
  background-color: #000033;
  border: 1px solid #000033;
  color: white;
  padding: 10px 20px;
  border-radius: 5px;
  text-align: center;
}

.btn-primary {
  background-color: navy;
}

.btn-danger {
  background-color: crimson;
}

.logo {
  width: 100%;
  max-width: 70%;
  display: block;
  margin: 20px auto;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.profile-img {
  display: block;
  margin: 0 auto;
  border-radius: 50%;
  width: 100px;
  height: 100px;
  object-fit: cover;
}

label {
  color: #800080;
}

.table thead th {
  text-align: center;
}
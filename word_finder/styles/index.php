<?php
    header("Content-type: text/css; charset: UTF-8");
    $fontFamily = "Cambria, Cochin, Georgia, Times, 'Times New Roman', serif";
    $primaryYellow = "#edd60b";
    $primaryPurple = "#600260";
    $primaryGrey = "#f2f2f2";
?>

body {
    font-family: <?php echo $fontFamily; ?>;
    background-color: <?php echo $primaryGrey; ?> !important;
    background-image: url("../images/1341.jpeg");
    background-size: cover;
    background-attachment: fixed;
    background-repeat: no-reapeat;
}

.my-container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
}

h1 {
    color: white;
    text-align: center;
    font-size: 4.1rem !important;
    font-style: oblique;
    margin:40px !important; 
    text-shadow: 2px 2px <?php echo $primaryPurple; ?>;
}

h2 {
    color: <?php echo $primaryPurple; ?>;
    font-size: 2.2rem;
    font-style: oblique;
}

.game-section {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-top:50px;
    padding:20px;
    width:600px;
    height:500px;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    gap:30px;
    background-color: white !important;
}

.game-section-1
{
    display:flex;
    flex-direction:row;
    gap:50px;
}

.game-section .themes-div
{
   width:90%;
   display:flex;
   flex-direction:column;
   gap:30px;
}

.start-button, .theme-button {
    color: white;
    background-color: <?php echo $primaryPurple; ?>;
    border: none;
    padding: 10px 20px;
    margin: 5px;
    cursor: pointer;
    border-radius: 4px;
    font-size:1.1rem;
}

.word-letters{
    display:flex;
    gap:12px;
}
.word-letters span{
    border-bottom: 4px solid <?php echo $primaryPurple; ?>;
    width:20px;
    display:flex;
    justify-content:center;
    text-transform:uppercase;
    font-size:2rem;
    font-weight:bold;
    height:50px;
}

.word-letters p {
    visibility: hidden;
    padding-bottom:20px;
}

#guess-input {
    padding: 10px;
    width: 200px;
    border: 1px solid <?php echo $primaryPurple; ?>;
    border-radius: 4px;
    font-size: 16px;
}

.progress{
    height:200px;
    width:70%;
}

.modal-dialog{
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.modal-header {
    display: flex;
    flex-direction:row;
    gap:20px;
    color:red;
}

#game-won .modal-title{
    color:green;
}
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>FAQ Page</title>
    <?php
        include_once 'header.php';
    ?>
    <style>
      /* CSS for FAQ section */
      .faq {
        margin: 50px auto;
        max-width: 600px;
      }
      .faq h2 {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
      }
      .faq h3 {
        font-size: 20px;
        font-weight: bold;
        margin-top: 30px;
      }
      .faq p {
        font-size: 16px;
        line-height: 1.5;
        margin-top: 10px;
      }
    </style>
  </head>
  <body>
    <div class="faq">
      <h2>Frequently Asked Questions</h2>
      <h3>Question 1 What is Netters?</h3>
      <p>Its a fun game of letters and aplhabets.We offer fun games with 6 level and 6 lives a session.</p>
      <h3>Question 2 Why Choose Us?</h3>
      <p>Because we are the best!
        <ul>
          <li> More than 40 years of experience</li>
          <li>Almost 50 certified professional members</li>
          <li>Services in more than 10 languages</li>
          <li>Free of cost</li>
        </ul>
      </p>
      <h3>Question 3 How to contact members?</h3>
      <p>Go to page <a href = "contactDevelopers.php">Talk with developers</a></p>
    </div>
    <?php
        include_once 'footer.php';
    ?>
  </body>
</html>

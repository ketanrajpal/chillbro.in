<?php require_once("config.php"); ?>
<!DOCTYPE HTML>
<html>
 <?php head("Chillbro &bull; Movers & Packers"); ?>
 <body>
 
  <?php top_header(); ?>
  
  <section id="header_two">
   <article>
   
   <h1><span>Step 1:</span> Select Shifting Source & Destination</h1>
   <p>Tell us where and when you want to shift from and where you want to go!</p>
   <form name="myform" id="myform" action="register/" method="get">
   <ul class="clear">
    <li>
     <fieldset>
      <input type="text" id="source_address" name="source_address" required />
     <label for="source_address">Source Pickup Address</label>
     </fieldset>
    </li>
    <li>
     <fieldset><input type="text" id="destination_address" name="destination_address" required />
     <label for="destination_address">Select Drop Address</label></fieldset>
    </li>
   </ul>
   <center><input type="submit" value="Next"></center>
   </form>
   
   
   </article>
  </section>
  <section id="tabs" class="clear">
  <div class="seprator"></div>
  <article> <img src="img/step-1.png">
    <h1>Step 1: Select shifting source <br>& destination</h1>
    <p>Tell us where and when you want to shift from and where you want to go!</p>
  </article>
  <article> <img src="img/step-2.png">
    <h1>Step 2: Provide Your<br>Details</h1>
    <p>Let us know your details, so that we can you reach in scheduled places on scheduled time.</p>
  </article>
  <article> <img src="img/step-3.png">
    <h1>Step 3: Get Immediate<br>Service</h1>
    <p>Having trouble? we are just a call away.</p>
  </article>
</section>

<section id="slider">
  <ul>
    <li><img src="img/slide-1.jpg" alt="<h1>Uninstalling</h1><h2>We are not only providing you with Transportation , Packing and unpacking service when we talk about relocation,  but we also Assist you with Pre-Shifting chaos, such as getting your Home and Office Appliance uninstalled which includes  Ac, geyser, Washing machine,water purifier, Inveter ETC.</h2>"></li>
    <li><img src="img/slide-2.jpg" alt="<h1>Packing & Labeling </h1><h2>Every Box And Consignment relocated by ChillBro.in is Properly Packed and Labeled, ,So that you don't mix up your Kitchenware with your books or any such item. When you need to find specific thing /product in a new place you can easily track it down by Reading Boxes Label.</h2>"></li>
    <li><img src="img/slide-3.jpg" alt="<h1>Transportation </h1><h2>There can be no doubt that the transportation is the most critical aspect of our Service . and so does our Highly Trained Employee and Drivers Involved in it. We Take Every Possible Effort by our Side To make sure your Consignment  is Safe, Cost  Effective and Friendly to your Pocket . </h2>"></li>
    <li><img src="img/slide-4.jpg" alt="<h1>Unpacking</h1><h2>Packing brings one side effect called unpacking , which can be really painful without some professional hands . But No  Problem now, as we will there to help you with all your unpacking Stuff.</h2>"></li>
    <li><img src="img/slide-5.jpg" alt="<h1>Installing</h1><h2>Just like Packing Brings problem of Unpacking , same does apply for uninstalling , but Why to worry ? Just ChillBro ! when we have take responsibility for your relocation we mean every aspect of it , so every Home and Office Appliance uninstalled by our Experts will Reinstalled by at New Destination without any extra charge. To bring you even more Extra smile .</h2>"></li>
  </ul>
  <script>
  $(document).ready(function(){
  $('#slider ul').bxSlider({pager:false, captions:true, auto:true});
});
  </script>
</section>
<section id="content">
<h1>Our Key features</h1>
</section>
<section id="home-section-3">

  <ul class="clear">
    <li>
      <div class="fa fa-clock-o"></div>
      <h2>Guaranteed<br>Time</h2>
      <p> We understand the value of time and so We make our best effort to make sure your consignment reaches the designation on time.</p>
      <!--<a href="../about">Read More<span class="fa fa-chevron-circle-right"></span></a>--> </li>
    <li>
      <div class="fa fa-dollar"></div>
      <h2>Price<br>Transparency</h2>
      <p> Here at Chillbro.in we have taken pledge to break Monopoly in this relocation industry and here we have uptake a very new and efficient system which is the price calculator on our site. That gives you approximated cost of shifting prior to date of relocation.</p>
      <!--<a href="../campus">Read More<span class="fa fa-chevron-circle-right"></span></a>--> </li>
    <li>
      <div class="fa fa-clock-o"></div>
      <h2>Packing and<br>Unpacking</h2>
      <p>We are not only Packing and Wrapping our Customers valuables in soft foams sturdy boxes but we are also unpacking and installing it at new destination without any extra charge .</p>
      <!--<a href="../contact">Read More<span class="fa fa-chevron-circle-right"></span></a>--> </li>
<li>
      <div class="fa fa-tags"></div>
      <h2>Labeling and<br>Scanning</h2>
      <p>Every consignment transported by Chillbro.in is properly Labelled and bar coded ,So that you don't mix up your Kitchenware with your books  or any such item. When you need to find specific thing /product in a new place you can easily track it down.
Chillbro.in  is complete and ultimate Shifting solution .We are the Relocators of New Generation.</p>
      <!--<a href="../contact">Read More<span class="fa fa-chevron-circle-right"></span></a>--> </li>

<li>
      <div class="fa fa-money"></div>
      <h2>Insurance<br><br></h2>
      <p>There are three ingredients in the good life: learning, earning and yearning. and we love our hard earned Assets , so even a single starch on our vehicle or broken cutlery can bring us pain . Therefore to keep all your valuable safe & Secure we recommend you   to get your valuable insured by chillbro.in before moving them. <br><br><br><br><br></p>
      <!--<a href="../contact">Read More<span class="fa fa-chevron-circle-right"></span></a>--> </li>
<li>
      <div class="fa fa-home"></div>
      <h2>Warehousing<br><br></h2>
      <p>Moving to new place and before shifting want to take long holiday ! No problem . At Chillbro.in we provide you with 720hrs of warehousing facility at your figure tips . Let's chillbro ! Happy Shifting .</p>
      <!--<a href="../contact">Read More<span class="fa fa-chevron-circle-right"></span></a>--> </li>
 </ul>
</section>
<?php sevices(); ?>
<?php footer(); ?>
 
 </body>
</html>
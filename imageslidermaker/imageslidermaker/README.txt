Image Slider Maker README
=========================
ImageSliderMaker.com


Using in your website
---------------------

Please first make sure you have fully extracted the contents of the zip file.
In Windows, right-click on imageslidermaker.zip and select Extract All...

To get your slider working in your web page, you must add
my-slider.css, ism-2.2.min.js and the slide images to your project
directory and paste the markup (included below) into your HTML.

The directory structure of this package:

  imageslidermaker/
    README.txt
    example.html
    ism/
      css/
        my-slider.css
      js/
        ism-2.2.js
        ism-2.2.min.js
      image/
        slides/
          _u/1468593388321_246607.jpg
          _u/1468593199256_671499.jpg
          _u/1468570854843_714309.jpg
          _u/1468570839223_17646.jpg
          _u/1468570614175_958006.jpeg
          _u/1468570609671_823976.jpg
          _u/1468570609381_848610.jpg
          _u/1468570608800_734435.jpg
          _u/1468570596468_756926.jpg
          _u/1468570585462_832950.jpg

For a working example, open example.html in your web browser or
follow the instructions below to integrate the slider into your
project.


Step by step instructions
-------------------------

1. Paste the following into the head of your HTML file:

<link rel="stylesheet" href="ism/css/my-slider.css"/>
<script src="ism/js/ism-2.2.min.js"></script>


2. Paste this into the body of your HTML file (at the location where:
   you would like your slider to appear in the page):

<div class="ism-slider" data-transition_type="zoom" data-play_type="loop" data-interval="3000" data-image_fx="zoompan" id="my-slider">
  <ol>
    <li>
      <img src="ism/image/slides/_u/1468593388321_246607.jpg">
    </li>
    <li>
      <img src="ism/image/slides/_u/1468593199256_671499.jpg">
      <div class="ism-caption ism-caption-0">Wildlife Sanctuaries/National Parks</div>
    </li>
    <li>
      <img src="ism/image/slides/_u/1468570854843_714309.jpg">
      <div class="ism-caption ism-caption-0">Hill Stations</div>
    </li>
    <li>
      <img src="ism/image/slides/_u/1468570839223_17646.jpg">
      <div class="ism-caption ism-caption-0">Lakes/Rivers</div>
    </li>
    <li>
      <img src="ism/image/slides/_u/1468570614175_958006.jpeg">
      <div class="ism-caption ism-caption-0">Beaches</div>
    </li>
    <li>
      <img src="ism/image/slides/_u/1468570609671_823976.jpg">
      <div class="ism-caption ism-caption-0">Religious Places</div>
    </li>
    <li>
      <img src="ism/image/slides/_u/1468570609381_848610.jpg">
      <div class="ism-caption ism-caption-0">Waterfalls</div>
    </li>
    <li>
      <img src="ism/image/slides/_u/1468570608800_734435.jpg">
      <div class="ism-caption ism-caption-0">Museums</div>
    </li>
    <li>
      <img src="ism/image/slides/_u/1468570596468_756926.jpg">
      <div class="ism-caption ism-caption-0">Caves</div>
    </li>
    <li>
      <img src="ism/image/slides/_u/1468570585462_832950.jpg">
      <div class="ism-caption ism-caption-0">Historical Monuments</div>
    </li>
  </ol>
</div>
<p class="ism-badge" id="my-slider-ism-badge"><a class="ism-link" href="http://imageslidermaker.com" rel="nofollow">generated with ISM</a></p>


3. Copy the ism/ directory into the root directory of your project.

   The css, js and image paths are relative, meaning the ism/
   directory should be in the same directory (path) as your HTML
   file containing the slider.


Support
-------

If you need support or have a suggestion please get in touch using
the contact form at ImageSliderMaker.com/contact or send an email
to support@imageslidermaker.com


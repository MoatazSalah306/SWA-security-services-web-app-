<script>
  var text = `Empowering, Next-Generation`;

  var index = 0;

  function typeText() {
      // Get the anchor element
      var anchorElement = document.getElementById("label");

      // Check if we've finished typing all characters
      if (index < text.length) {
          // Get the next character to type
          var char = text.charAt(index);

          if (char === "<") {
              // Find the end of the tag
              var endIndex = text.indexOf(">", index);
              // Extract the tag including <>
              var tag = text.substring(index, endIndex + 1);
              // Move the index to the end of the tag
              index = endIndex + 1;
              // Append the tag to the anchor element
              anchorElement.innerHTML += tag;
          } else {
              // Simulate typing the character by appending it to innerHTML
              anchorElement.innerHTML += char;
              // Increment index for the next character
              index++;
          }

          // Schedule the next character to be typed after a short delay
          setTimeout(typeText, 80); // Adjust the delay as needed
      }
  }

  window.onload = function() {
      typeText();
  };
</script>
<section class="text-gray-400 bg-gray-900 body-font px-8">
    <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
      <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-white">
          <span style="transition: all" id="label"></span>  
          <br class="hidden lg:inline-block">Technology Solutions
        </h1>
        <p class="mb-8 leading-relaxed">Don't sweat tech troubles! Our web app diagnoses and fixes any hardware or software issue you throw its way. <br>Say goodbye to tech headaches! Our web app provides user-friendly solutions for all your hardware and software woes.</p>
        <div class="flex justify-center">
          <button class="inline-flex text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded text-lg">Get Started</button>
          <button class="ml-4 inline-flex text-gray-400 bg-gray-800 border-0 py-2 px-6 focus:outline-none hover:bg-gray-700 hover:text-white rounded text-lg">Further Information</button>
        </div>
      </div>
      <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
        <img class="object-cover object-center rounded" alt="hero" src="{{ asset('images/home.svg') }}">
      </div>
    </div>
  </section>
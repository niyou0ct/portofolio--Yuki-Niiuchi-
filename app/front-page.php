<?php get_header(); ?>
 <main data-namespace="top" class="barba-container">
   <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/min/main.min.css">

   <section class="firstView">
     <div class="firstInner">

       <div class="leadText">
         <p><span>accelerate</span><span>your business</span></p>
       </div>

       <section class="mainTitle">
         <div class="infoList">
           <h1>Yuki Niiuchi</h1>
           <p>Front End Designer</p>
         </div>
       </section>

     </div>

   </section>

   <div id="topAnimationApp"></div>
   <div id="info">
    <div id="notSupported" style="display:none;">Sorry your graphics card + browser does not support hardware instancing</div>
  </div>
 </main>

<?php get_template_part('nav'); ?>
<script id="vertexShader" type="x-shader/x-vertex">
  precision highp float;

  uniform float sineTime;
  uniform vec2 mouse;

  uniform mat4 modelViewMatrix;
  uniform mat4 projectionMatrix;

  attribute vec3 position;
  attribute vec3 offset;
  attribute vec4 color;
  attribute vec4 orientationStart;
  attribute vec4 orientationEnd;

  varying vec3 vPosition;
  varying vec4 vColor;

  void main(void){
    // vec2 m = vec2(mouse.x * 2.0 - 1.0, -mouse.y * 2.0 + 1.0);
    // float sineTime = sin(length(m) * 30.0 + sineTime * 5.0);
    // vPosition = offset * max( abs( sineTime * 2.0 + 1.0 ), 0.5 ) + position;
    vPosition = offset * 0.5 + position;
    vec4 orientation = normalize(mix(orientationStart, orientationEnd, sineTime));
    vec3 vcV = cross(orientation.xyz, vPosition);
    vPosition = vcV * (2.0 * orientation.w) + (cross(orientation.xyz, vcV) * 2.0 + vPosition);

    vColor = color;

    gl_Position = projectionMatrix * modelViewMatrix * vec4(vPosition, 0.5);
  }
</script>
<script id="fragmentShader" type="x-shader/x-fragment">
  precision highp float;

  uniform float time;

  varying vec3 vPosition;
  varying vec4 vColor;

  void main(){
    vec4 color = vec4(vColor);
    color.r += sin(vPosition.x * 10.0 + time) * 0.5;

    gl_FragColor = color;
  }
</script>
<?php get_footer(); ?>

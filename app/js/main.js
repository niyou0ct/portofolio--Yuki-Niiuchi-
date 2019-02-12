document.addEventListener('DOMContentLoaded', function() {
  'use strict';

  topAnimationApp();

  function topAnimationApp(){
    if(WEBGL.isWebGLAvailable() === false){
      doument.body.appendChild(WebGL.getWebGLErrorMessage());
    }

    var container, stats;
    var camera, scene, renderer;

    var loader;

    var mouseX = 0,
        mouseY = 0;
    var windowHalfX = window.innerWidth / 2;
    var windowHalfY = window.innerHeight / 2;

    init();
    animate();

    function init(){
      container = document.getElementById('topAnimationApp');

      camera = new THREE.PerspectiveCamera(50, window.innerWidth / window.innerHeight, 1, 10);
      camera.position.z = 5;

      scene = new THREE.Scene();


      //geometry
      var vector = new THREE.Vector4();

      var instances = 5000;

      var positions = [];
      var offsets = [];
      var colors = [];

      positions.push( 0.025, - 0.025, 0 );
			positions.push( - 0.025, 0.025, 0 );
			positions.push( 0, 0, 0.025 );

      var mesh = new THREE.Mesh(geometry, material);
      scene.add(mesh);

      renderer = new THREE.WebGLRenderer();
      renderer.setPixelRatio(window.devicePixelRatio);
      renderer.setSize(window.innerWidth, window.innerHeight);
      renderer.setClearColor(0xf8f8f8);
      container.appendChild(renderer.domElement);

      if ( renderer.extensions.get( 'ANGLE_instanced_arrays' ) === null ) {
				document.getElementById( 'notSupported' ).style.display = '';
				return;
			}

      document.addEventListener('mousemove', onDocumentMouseMove, false);
      // document.addEventListener('touchstart', onDocumentTouchStart, false);
      // document.addEventListener('touchmove', onDocumentTouchMove, false);
      window.addEventListener('resize', onWindowResize, false);
    }

    function onWindowResize(){
      camera.aspect = window.innerWidth / window.innerHeight;
      camera.updateProjectionMatrix();

      renderer.setSize(window.innerWidth, window.innerHeight);
    }

    function onDocumentMouseMove(event) {
      mouseX = (event.clientX - windowHalfX) * 0.5;
      mouseY = (event.clientY - windowHalfY) * 0.5;
    }

    function onDocumentTouchStart(event){
      if(event.touches.length === 1){
        event.preventDefault();

        mouseX = event.touches[0].pageX - windowHalfX;
        mouseY = event.touches[0].pageY - windowHalfX;
      }
    }

    function onDocumentTouchMove(event){
      if(event.touches.length === 1){
        event.preventDefault();

        mouseX = event.touches[0].pageX - windowHalfX;
        mouseY = event.touches[0].pageY - windowHalfX;
      }
    }

    function animate(){
      requestAnimationFrame(animate);

      render();
    }


    function render(){
      // camera.position.x += ( mouseX - camera.position.x ) * 0.00005;
			// camera.position.y += ( - mouseY - camera.position.y ) * 0.00005;
			camera.lookAt( scene.position );

      renderer.render(scene, camera);
    }
  }

});

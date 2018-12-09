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
      var orientationsStart = [];
      var orientationsEnd = [];



      positions.push( 0.025, - 0.025, 0 );
			positions.push( - 0.025, 0.025, 0 );
			positions.push( 0, 0, 0.025 );

      // instances attributes
      for(var i=0; i<instances; i++){
        // offsets
        offsets.push(0.1, 0.5, 1.0);

        // colors
        colors.push(Math.random(), Math.random(), Math.random(), Math.random());


        // orientation start
        vector.set(Math.random() * 2 - 1, Math.random() * 2 - 1, Math.random() * 2 - 1, Math.random() * 2 - 1);
        vector.normalize();

        orientationsStart.push(vector.x, vector.y, vector.z, vector.w);

        // orientation end
        vector.set(Math.random() * 2 - 1, Math.random() * 2 - 1, Math.random() * 2 - 1, Math.random() * 2 - 1);
        vector.normalize();

        orientationsEnd.push(vector.x, vector.y, vector.z, vector.w);
      }

      var geometry = new THREE.InstancedBufferGeometry();

      geometry.maxInstancedCount = instances;
      geometry.addAttribute('position', new THREE.Float32BufferAttribute(positions, 3));

      geometry.addAttribute('offset', new THREE.InstancedBufferAttribute(new Float32Array(offsets), 3));
      geometry.addAttribute('color', new THREE.InstancedBufferAttribute(new Float32Array(colors), 4));
      geometry.addAttribute('orientationStart', new THREE.InstancedBufferAttribute(new Float32Array(orientationsStart), 4));
      geometry.addAttribute('orientationEnd', new THREE.InstancedBufferAttribute(new Float32Array(orientationsEnd), 4));


      // material;
      var material = new THREE.RawShaderMaterial({
        uniforms: {
          time: {value: 1.0},
          sineTime: {value: 1.0}
        },
        vertexShader: document.getElementById('vertexShader').textContent,
        fragmentShader: document.getElementById('fragmentShader').textContent,
        side: THREE.DoubleSide,
        transparent: true
      });

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
			//
			// var gui = new dat.GUI( { width: 350 } );
			// gui.add( geometry, 'maxInstancedCount', 0, instances );
			// //
			// stats = new Stats();
			// container.appendChild( stats.dom );

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
    //

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
      // stats.update();
    }


    function render(){
      var time = performance.now();
      var object = scene.children[0];
      // camera.position.x += ( mouseX - camera.position.x ) * 0.00005;
			// camera.position.y += ( - mouseY - camera.position.y ) * 0.00005;
			camera.lookAt( scene.position );

      // object.rotation.x = time * 0.0002;
      object.rotation.y = time * 0.0002;
      // object.rotation.z = time * 0.0002;
      object.material.uniforms.time.value = time * 0.005;
      object.material.uniforms.sineTime.value = Math.sin(object.material.uniforms.time.value * 0.01);

      renderer.render(scene, camera);
    }
  }

});

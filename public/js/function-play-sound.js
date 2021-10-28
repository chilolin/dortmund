console.log("check-js");
function PlayChord(chord_array,unit_time){
    for (t=0; t<32; t++){
      audioctx = new AudioContext();
      var T = String(t);
      osc_T = new OscillatorNode(audioctx);
      osc_T.frequency.value = chord_array[t];
      osc_T.type = "square";
      osc_T.connect(audioctx.destination);
      osc_T.start(t*unit_time);
      osc_T.stop((t+1)*unit_time);
    }
  }
  

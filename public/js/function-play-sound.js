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
  
function playAccompany(mero_array,chord_array,unit_time){

  
  for (t=0; t<32; t++){
    audioctx = new AudioContext();
    osc_T = new OscillatorNode(audioctx);
    osc_T.frequency.value = mero_array[t];
    osc_T.type = "square";
    osc_T.connect(audioctx.destination);
    osc_T.start(t*unit_time);
    osc_T.stop((t+1)*unit_time);
  }
  console.log(t);

  key_array = ["key1","key2","key3"];
  console.log(Object.entries(chord_array));

  for (s=0; s<4; s++){
    var S = String(s);
    for (u=0; u<3; u++){
      var U = String(u);
      audioctx = new AudioContext();
      osc_S_U = new OscillatorNode(audioctx);
      osc_S_U.frequency.value = Object.entries(chord_array)[s][1][key_array[u]];
      console.log(Object.entries(chord_array)[s][1][key_array[u]]);
      osc_S_U.type = "sine";
      osc_S_U.connect(audioctx.destination);
      osc_S_U.start(s*unit_time*8);
      osc_S_U.stop((s+1)*unit_time*8);


    }

  }
  console.log(s);

}
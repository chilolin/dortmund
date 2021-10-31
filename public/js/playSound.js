// console.log("check-js");

function playAccompany(mero_array, chord_array, unit_time) {
    // console.log(mero_array);
    // console.log(chord_array);

    // const startTime = Date.now();
    // console.log("START", startTime);

    note_array = ["note1", "note2", "note3"];

    audioctx = new AudioContext();

    for (t = 0; t < 32; t++) {
        s = t % 8;

        if (s == 0) {
            osc_chord0 = new OscillatorNode(audioctx);
            osc_chord0.frequency.value =
                Object.entries(chord_array)[Math.floor(t / 8)][1][note_array[0]];
            osc_chord0.type = "sine";
            osc_chord0.connect(audioctx.destination);
            osc_chord0.start(t * unit_time);

            osc_chord1 = new OscillatorNode(audioctx);
            osc_chord1.frequency.value =
                Object.entries(chord_array)[Math.floor(t / 8)][1][note_array[1]];
            osc_chord1.type = "sine";
            osc_chord1.connect(audioctx.destination);
            osc_chord1.start(t * unit_time);

            osc_chord2 = new OscillatorNode(audioctx);
            osc_chord2.frequency.value =
                Object.entries(chord_array)[Math.floor(t / 8)][1][note_array[2]];
            osc_chord2.type = "sine";
            osc_chord2.connect(audioctx.destination);
            osc_chord2.start(t * unit_time);
        }

        if (s == 7) {
            osc_chord0.stop((t + 1) * unit_time);
            osc_chord1.stop((t + 1) * unit_time);
            osc_chord2.stop((t + 1) * unit_time);
        }

        osc_mero = new OscillatorNode(audioctx);
        osc_mero.frequency.value = mero_array[t];
        osc_mero.type = "square";
        osc_mero.connect(audioctx.destination);
        osc_mero.start(t * unit_time);
        osc_mero.stop((t + 1) * unit_time);
    }

    // const endTime = Date.now();
    // console.log("ENDTIME", endTime);
    // console.log("END-START", endTime - startTime);
}

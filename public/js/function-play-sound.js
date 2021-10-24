function playChord(chord) {
    audioctx = new AudioContext();
    osc = new OscillatorNode(audioctx);
    osc.frequency.value = chord;
    osc.type = "sine";
    osc.connect(audioctx.destination);
    osc.start();
    osc.stop(1);
}

function downPlayChord(first, second, third, forth, fifth, sixth) {
    audioctx = new AudioContext();
    osc_first = new OscillatorNode(audioctx);
    osc_first.frequency.value = first;
    osc_first.type = "sine";
    osc_first.connect(audioctx.destination);

    osc_second = new OscillatorNode(audioctx);
    osc_second.frequency.value = second;
    osc_second.type = "sine";
    osc_second.connect(audioctx.destination);

    osc_third = new OscillatorNode(audioctx);
    osc_third.frequency.value = third;
    osc_third.type = "sine";
    osc_third.connect(audioctx.destination);

    osc_forth = new OscillatorNode(audioctx);
    osc_forth.frequency.value = forth;
    osc_forth.type = "sine";
    osc_forth.connect(audioctx.destination);

    osc_fifth = new OscillatorNode(audioctx);
    osc_fifth.frequency.value = fifth;
    osc_fifth.type = "sine";
    osc_fifth.connect(audioctx.destination);

    osc_sixth = new OscillatorNode(audioctx);
    osc_sixth.frequency.value = sixth;
    osc_sixth.type = "sine";
    osc_sixth.connect(audioctx.destination);


    // osc_sixth.start();
    // osc_sixth.stop(10);
    // osc_fifth.start();
    // osc_fifth.stop(0.1);
    // osc_forth.start();
    // osc_forth.stop(0.1);
    osc_third.start();
    osc_third.stop(1);
    osc_second.start();
    osc_second.stop(1);
    osc_first.start();
    osc_first.stop(1);

    // setTimeout(window.location.href = "./music-test-3.php",100000);
}

function upPlayChord(first, second, third, forth, fifth, sixth) {
    audioctx = new AudioContext();
    osc_first = new OscillatorNode(audioctx);
    osc_first.frequency.value = first;
    osc_first.type = "sine";
    osc_first.connect(audioctx.destination);

    osc_second = new OscillatorNode(audioctx);
    osc_second.frequency.value = second;
    osc_second.type = "sine";
    osc_second.connect(audioctx.destination);

    osc_third = new OscillatorNode(audioctx);
    osc_third.frequency.value = third;
    osc_third.type = "sine";
    osc_third.connect(audioctx.destination);

    osc_forth = new OscillatorNode(audioctx);
    osc_forth.frequency.value = forth;
    osc_forth.type = "sine";
    osc_forth.connect(audioctx.destination);

    osc_fifth = new OscillatorNode(audioctx);
    osc_fifth.frequency.value = fifth;
    osc_fifth.type = "sine";
    osc_fifth.connect(audioctx.destination);

    osc_sixth = new OscillatorNode(audioctx);
    osc_sixth.frequency.value = sixth;
    osc_sixth.type = "sine";
    osc_sixth.connect(audioctx.destination);

    osc_first.start();
    osc_first.stop(0.1);
    osc_second.start(0.1);
    osc_second.stop(0.2);
    osc_third.start(0.2);
    osc_third.stop(0.3);
    osc_forth.start(0.3);
    osc_forth.stop(0.4);
    osc_fifth.start(0.4);
    osc_fifth.stop(0.5);
    osc_sixth.start(0.5);
    osc_sixth.stop(0.6);
}

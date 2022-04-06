import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Cronometro',
      theme: ThemeData(
        primarySwatch: Colors.blue,
      ),
      home: const MyHomePage(title: 'Cronometro'),
    );
  }
}

class MyHomePage extends StatefulWidget {
  const MyHomePage({Key? key, required this.title}) : super(key: key);

  final String title;

  @override
  State<MyHomePage> createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> {
  late Stream<int> stream;
  String temp = "00:00:00";
  int _counter = 0;
  int y = 0;
  bool pausa = false;
  int seconds = 0;
  int minutes = 0;
  int hours = 0;
  bool _reset = false;
  void _incrementCounter() async {
    stream = Stream<int>.periodic(
        const Duration(seconds: 1), (value) => value + 1 + y);
    await for (int i in stream) {
      if (pausa) {
        y = i;
        break;
      }
      if (_reset) {
        i = 0;
        y = 0;
        _counter = 0;
      }

      setState(() {
        _counter = i;
        minutes = _counter ~/ 60;
        seconds = _counter % 60 - (minutes);
        hours = _counter ~/ 3600;
        temp = hours.toString().padLeft(2, '0') +
            ":" +
            minutes.toString().padLeft(2, '0') +
            ":" +
            seconds.toString().padLeft(2, '0');
      });
    }
  }

  void start() {
    setState(() {
      if (pausa) {
        pausa = false;
        _incrementCounter();
      }
    });
  }

  void pause() {
    setState(() {
      if (!pausa) {
        pausa = true;
      }
    });
  }

  void reset() {
    setState(() {
      _counter = 0;
      y = 0;
      temp = "00:00:00";
      _reset = false;
      pause();
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text(widget.title),
      ),
      body: Center(
          child: Column(mainAxisAlignment: MainAxisAlignment.center, children: [
        Text(
          temp,
          style: TextStyle(fontSize: 50),
        ),
        Row(mainAxisAlignment: MainAxisAlignment.center, children: <Widget>[
          IconButton(
              onPressed: () {
                start();
              },
              color: Colors.green,
              iconSize: 50,
              icon: Icon(Icons.play_arrow)),
          IconButton(
              onPressed: () {
                setState(() {
                  pause();
                });
              },
              color: Colors.green,
              iconSize: 50,
              icon: Icon(Icons.pause)),
          Visibility(
            child: IconButton(
                onPressed: () {
                  setState(() {
                    _reset = true;
                    reset();
                  });
                },
                color: Colors.green,
                iconSize: 50,
                icon: Icon(Icons.restart_alt_outlined)),
            visible: pausa,
          )
        ]),
      ])),
    );
  }
}

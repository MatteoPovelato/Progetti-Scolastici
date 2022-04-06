import 'dart:io';
import 'package:flutter/material.dart';
import 'messages.dart';

ScrollController c = ScrollController();
late String messaggio;
String username = "Ignoto";
late Socket s;
List<Widget> messaggi = [];

void main() {
  Widget sendMessageBuilder(String messaggio) {
    List<String> message = messaggio.split(':');
    return Column(
      children: <Widget>[
        Row(children: <Widget>[
          Expanded(
            child: Container(),
          ),
          Column(
            children: <Widget>[
              Text(message[0],
                  style: const TextStyle(fontSize: 15, color: Colors.blue)),
              Text(message[1],
                  style: const TextStyle(fontSize: 20, color: Colors.black)),
              Text(
                  (DateTime.now().hour.toString() +
                      "." +
                      (DateTime.now().minute.toString().length == 1
                          ? "0" + DateTime.now().minute.toString()
                          : DateTime.now().minute.toString())),
                  style: const TextStyle(fontSize: 15, color: Colors.black)),
            ],
          ),
          Container(
            width: 20,
          ),
        ]),
        Container(
          height: 5,
        )
      ],
    );
  }

  void clearMessages() {
    messaggi.clear();
  }

  void socketConnector() {
    void dataHandler(data) {
      messaggi.add(sendMessageBuilder(String.fromCharCodes(data).trim()));
    }

    void errorHandler(error) {
      print(error);
    }

    void doneHandler() {
      s.destroy();
      exit(0);
    }

    // change IP address
    Socket.connect("192.168.8.150", 4000).then((Socket sock) {
      s = sock;
      s.listen(dataHandler,
          onError: errorHandler, onDone: doneHandler, cancelOnError: false);
    });
  }

  clearMessages();
  socketConnector();
  runApp(MyApp());
}

class MyApp extends StatefulWidget {
  @override
  _MyAppState createState() => _MyAppState();
}

class _MyAppState extends State<MyApp> {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Chatroom',
      theme: ThemeData(
        primarySwatch: Colors.blue,
        secondaryHeaderColor: Colors.white,
      ),
      home: MyHomePage(title: 'Chatroom Bella'),
    );
  }
}

class MyHomePage extends StatefulWidget {
  MyHomePage({required this.title});

  final String title;

  @override
  _MyHomePageState createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> {
  final Widget _messages = Messages();

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(
          centerTitle: true,
          title: Text(widget.title),
        ),
        backgroundColor: Colors.white,
        body: _messages);
  }
}

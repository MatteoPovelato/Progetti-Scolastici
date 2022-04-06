import 'main.dart';
import 'package:flutter/material.dart';

class Messages extends StatefulWidget {
  Messages();

  @override
  MessagesState createState() => MessagesState();
}

class MessagesState extends State<Messages> {
  void reload() {
    setState(() {});
  }

  Widget sendMessageBuilder(var username, var messaggio, var ora) {
    return Column(
      children: <Widget>[
        Row(children: <Widget>[
          Expanded(
            child: Container(),
          ),
          Column(
            children: <Widget>[
              Text(username,
                  style: const TextStyle(fontSize: 15, color: Colors.blue)),
              Text(messaggio,
                  style: const TextStyle(fontSize: 20, color: Colors.black)),
              Text(ora,
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

  Widget sendBox() {
    return Row(mainAxisAlignment: MainAxisAlignment.center, children: <Widget>[
      Flexible(
        flex: 1,
        child: Form(child: Container()),
      ),
      Flexible(
        flex: 8,
        child: Form(
          child: TextFormField(
            style: const TextStyle(color: Colors.black),
            decoration: const InputDecoration(
                filled: true,
                hintText: 'Scrivi un messaggio...',
                hintStyle: TextStyle(color: Colors.black),
                labelStyle: TextStyle(fontSize: 18)),
            onChanged: (text) {
              setState(() {
                if (text != "") {
                  messaggio = text;
                }
              });
            },
          ),
        ),
      ),
      Flexible(
        flex: 1,
        child: Form(child: Container()),
      ),
      Flexible(
          flex: 2,
          child: Column(
            children: <Widget>[
              SizedBox(
                  width: 50,
                  height: 50,
                  child: FloatingActionButton(
                    child: const Icon(Icons.send),
                    backgroundColor: Colors.blue,
                    onPressed: () {
                      if (messaggio != "" && username != "") {
                        setState(() {
                          messaggi.add(sendMessageBuilder(
                              username,
                              messaggio,
                              DateTime.now().hour.toString() +
                                  "." +
                                  (DateTime.now().minute.toString().length == 1
                                      ? "0" + DateTime.now().minute.toString()
                                      : DateTime.now().minute.toString())));
                        });
                        s.write(username + ':' + messaggio);
                      }
                    },
                  )),
            ],
          ))
    ]);
  }

  Widget login() {
    return SizedBox(
        width: 150,
        height: 50,
        child: IconButton(
          icon: Icon(Icons.login),
          color: Colors.blue,
          onPressed: () {
            loginDialog();
          },
        ));
  }

  void loginDialog() {
    showDialog(
      context: context,
      barrierDismissible: false,
      builder: (BuildContext context) {
        return AlertDialog(
          title: const Center(
            child: Text(
              'Inserisci utente',
              style: TextStyle(
                  fontSize: 20.0,
                  fontWeight: FontWeight.bold,
                  color: Colors.white),
            ),
          ),
          backgroundColor: Colors.blue,
          content: Row(
            mainAxisAlignment: MainAxisAlignment.center,
            crossAxisAlignment: CrossAxisAlignment.center,
            children: <Widget>[
              SizedBox(
                  width: 100,
                  height: 50,
                  child: TextFormField(
                    decoration: const InputDecoration(
                        filled: true,
                        fillColor: Colors.blue,
                        hintText: 'Utente',
                        hintStyle: TextStyle(color: Colors.black),
                        labelStyle: TextStyle(
                          fontSize: 18,
                          color: Colors.black,
                        )),
                    onChanged: (text) {
                      setState(() {
                        if (text != "") {
                          username = text;
                        }
                      });
                    },
                  ))
            ],
          ),
          actions: <Widget>[
            TextButton(
                child:
                    const Text('Salva', style: TextStyle(color: Colors.white)),
                onPressed: () {
                  Navigator.of(context).pop();
                })
          ],
        );
      },
    );
  }

  @override
  Widget build(BuildContext context) {
    return Column(
      children: <Widget>[
        Expanded(
            child: ListView.builder(
          controller: c,
          addAutomaticKeepAlives: true,
          itemCount: messaggi.length,
          itemBuilder: (BuildContext ctxt, int index) {
            return (messaggi.elementAt(index));
          },
        )),
        Container(child: login()),
        Padding(padding: const EdgeInsets.all(10.0), child: sendBox()),
      ],
    );
  }
}

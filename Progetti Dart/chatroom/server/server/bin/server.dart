import 'dart:io';

List<ChatClient> clients = [];

void distributeMessage(ChatClient client, String messages) {
  for (ChatClient c in clients) {
    if (c != client) {
      c.write(messages);
    }
  }
}

late ServerSocket server;

void main() {
  ServerSocket.bind(InternetAddress.anyIPv4, 4000).then((ServerSocket socket) {
    server = socket;
    server.listen((client) {
      handleConnection(client);
    });
  });
}

void handleConnection(Socket client) {
  print('Connection from '
      '${client.remoteAddress.address}:${client.remotePort}');

  clients.add(ChatClient(client));

  client.write("Welcome to dart-chat! "
      "There are ${clients.length - 1} other clients\n");
}

class ChatClient {
  late Socket _socket;
  late String _address;
  late int _port;

  ChatClient(Socket s) {
    _socket = s;
    _address = _socket.remoteAddress.address;
    _port = _socket.remotePort;

    _socket.listen(messageHandler,
        onError: errorHandler, onDone: finishedHandler);
  }

  void messageHandler(data) {
    String message = String.fromCharCodes(data).trim();
    distributeMessage(this, message);
  }

  void errorHandler(error) {
    print('$_address:$_port Error: $error');
    removeClient(this);
    _socket.close();
  }

  void finishedHandler() {
    print('$_address:$_port Disconnected');
    removeClient(this);
    _socket.close();
  }

  void write(String message) {
    _socket.write(message);
  }

  void removeClient(ChatClient client) {
    clients.remove(client);
  }
}

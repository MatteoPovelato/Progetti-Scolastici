import 'dart:io';
import 'dart:math';
import 'package:flutter/material.dart';  
  
void main() => runApp(MyApp());  
  var rng=new Random();
  int turni=0;
// ignore: use_key_in_widget_constructors
class MyApp extends StatelessWidget {  
  Widget build(BuildContext context){
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      home: HomePage(),
    );
  }
}
  
class HomePage extends StatefulWidget{
  _HomePageState createState() => _HomePageState();
}

class _HomePageState extends State<HomePage>{

  bool turno= true;
  bool vittoria=false;
  List<String> visual = ['','','','','','','','','',];

  Widget build(BuildContext context){
    return Scaffold(
        appBar: AppBar(
          title: const Text('Tris'),
          backgroundColor: Colors.green.shade900,
        ),
        backgroundColor: Colors.green[200],
        body: GridView.builder(
          itemCount: 9,
         gridDelegate: 
          SliverGridDelegateWithFixedCrossAxisCount(crossAxisCount: 3),
         itemBuilder: (BuildContext context, int numCont){
           return GestureDetector(
             onTap: (){
               _tapped(numCont);
             },
             child: Container(
               decoration: BoxDecoration(
                 border: Border.all(color: Colors.green.shade900)
               ),
               child: Center(
                 child: Text(visual[numCont],style: TextStyle(color: Colors.purple, fontSize: 100),),
               ),
             ),
           );
         } 
         ),floatingActionButton: FloatingActionButton(
           onPressed:() {_ricarica();},
           child: const Icon(
             Icons.refresh,
           ),
           backgroundColor: Colors.green.shade900,
         ),
        
    );
  }

  void _tapped (int numCont) {
    bool cond=false;
    if(visual[numCont]=='X'||visual[numCont]=='O'||vittoria==true){
      
    }else{
    setState(() {
        visual[numCont]='O';
        turni++;
        do{
          numCont=rng.nextInt(9);
          if(visual[numCont]!=''){
            if(visual[numCont]!='O'){
              visual[numCont]='X';
              cond=true;
            }
          }else{
            if(visual[numCont]!='O'){
              visual[numCont]='X';
              cond=true;
            }
          }
        }while(cond==false);
        turni++;

    _vittoria();

      });
    }
  }
  void _vittoria(){
    String vincitore ='';
    bool pareggio= false;
    //controllo righe
    for(int i=2;i<=8;i+=3){
     if(visual[i]!='' && visual[i-1]==visual[i-2] && visual[i]==visual[i-2]){
       vincitore=visual[i];
       vittoria=true;
       _stampa(vincitore);
     }
    }
    //controllo colonne
    for(int i=0;i<=2;i++){
      if(visual[i]!='' && visual[i]==visual[i+3] && visual[i] == visual[i+6]){
        vincitore=visual[i];
        vittoria=true;
        _stampa(vincitore);
      }
    }
    //controllo diagonali
    if(visual[0]!='' && visual[0]==visual[4]&&visual[0]==visual[8]){
      vincitore=visual[0];
        vittoria=true;
        _stampa(vincitore);
    }
    if(visual[2]!='' && visual[2]==visual[4]&&visual[2]==visual[6]){
      vincitore=visual[2];
        vittoria=true;
        _stampa(vincitore);
    }
    if(turni==9){
      _stampaPareggio();
    }
  }

  void _stampa(String vincitore){
  
    showDialog(
      context: context,
       builder:(BuildContext context){
         return AlertDialog(
           title: Text('Il vincitore è: '+ vincitore),
         );
       }
       );
  }
void _stampaPareggio(){
  
    showDialog(
      context: context,
       builder:(BuildContext context){
         return AlertDialog(
           title: Text('Pareggio'),
         );
       }
       );
  }

  void _ricarica(){
    setState(() {
      for(int i=0;i<=8;i++){
      visual[i]='';
    }
    vittoria=false;
    });
    
  }
}
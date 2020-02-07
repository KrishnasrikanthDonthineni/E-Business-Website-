
//=================== OS-2 Projects ============================
// CLIENT Site to the Server site
// + Send Data (Question) to the Server Site with FLAG (lock)
// + Receive Data (Answer) from the Server Site
//===============================================================
import java.util.*;
import java.awt.*;
import java.io.*;
import java.net.*;

//===============================================================
// * creates instances of InServer, OutServer
//================================================================

public class Client {

//===========================================
//   DATA PART
//===========================================

   //Ports used for CONNECTION to the Server.
   //.........................................


  Socket fs = null;
  boolean isConnect = false;

  //String hostName = "localhost";

  //IP ADDRESSES
  //**************
static int Port_to_Server; // to Send QUESTION to SERVER from the Client

   static int Port_from_Server; // to Receive ANSWER from SERVER to the Client


   String ServerName = "wyvern.cs.newpaltz.edu";
   // Put here the IP or Name address of the Server

   //FILE NAMES
   //*************

 // String QflagName = "o-Q-bank-f.dat"; // Lock Flag-File for Question (DATA at Client to send to Server)
 //  String QnameAtC = "o-Q-bank.dat";   // Question-File name (of DATA=QUESTION) at Client to send to Server
   String QnameAtS = "Qs.dat";   // Question-File name (of DATA=QUESTION) to be GIVEN to the Server 

 //  String AflagName = "o-A-bank-f.dat"; // Lock Flag-File for ANSWER (DATA at Client to send to Server)
   String AnameAtC = "Ac.dat";  // Answer-File name used to write the DATA=ANSWER 
                                // (received at Client site from the Server) 
   String AnameAtS = "As.dat";  // Answer-File name used to ask for at Server site


  /*=============================================
   * MAIN PART :
   *=============================================*/

   public Client (String f1,String f2,String f3) {

//System.out.println(f1+","+f2);

   String QflagName = f1; // Lock Flag-File for Question (DATA at Client to send to Server)
   String QnameAtC = f2;   // Question-File name (of DATA=QUESTION) at Client to send to Server
 String AflagName = f3; // Lock Flag-File for ANSWER (DATA at Client to send to Server)
 //System.out.println(f4+"Krishna");
  //  Port_to_Server = Integer.parseInt(f4); // to Send QUESTION to SERVER from the Client

  //  Port_from_Server = Integer.parseInt(f5); // to Receive ANSWER from SERVER to the Client


    
   //*************************
   //Connection to the Server
   //**************************
    
    // CHECK the LOCK(FLAG) of the QUESTION until it turns to "1" 
    //........................................................
    
    while (ReadFlag(QflagName)!=1)
       {
         System.out.println (" ... Waiting for Data ... its flag is at "+QflagName+"\n");
       }

 
    // To Send QUESTION (as a CLIENT) to the Server, exp "Qc.dat"
    //........................................................
	   SendClientFile(QnameAtS,QnameAtC,Port_to_Server,ServerName);


    // TAKE the ANSWER (as a CLIENT) from the SERVER
       TakeServerFile(AnameAtS,AnameAtC,Port_from_Server,ServerName);
       
    // WRITE "1" to the LOCK(FLAG) of the ANSWER 
    //........................................................
       WriteFlag(AflagName,"1");
  
  //END of connection to the Server
  //*********************************

} 


   //================================
   //FUNCTION PART
   //================================


   //...................................................
   //Open Socket
   //..................................................
   public boolean Connect (int port, String hostName) {

      if (isConnect) Disconnect ();

      try {
         fs = new Socket (hostName, port);
      }
      catch (Exception e) {
         System.out.println (" Unable to open Input-Port socket at : " +hostName +port);
         return false;
      }

      System.out.println  (" Connected to " + hostName + " at port: " +port);
      isConnect = true;
      return true;
   }

   //.................................................
   //Close Socket
  //.................................................

   public void Disconnect () {

      if (isConnect) {
         try {
            fs.close ();
         }
         catch (IOException e) {
               System.out.println ("Exception caught closing socket.");
          }
         System.out.println  (" Disconnected ");
         isConnect = false;
      }
   }

    
 //...............................................................
 // Read what is in a FLAG file and Converts it into an Interger
 //...............................................................
 public int ReadFlag (String FileName) {

    int ReturnValue=0;

  // OPEN the given File 
  //.........................................................

              FileInputStream ReadFile = null;

                try {
                   ReadFile = new FileInputStream (FileName);
                }

                catch (Exception e) {
	               System.out.println (e);
	               //System.exit (1);
                 }

    // READ the file
    //..................................................................

             DataInputStream ds = new DataInputStream (ReadFile);
             
              try {
                      String s = ds.readLine (); // Read Data from the given File
   	          try {
                      ReturnValue = Integer.parseInt(s);
                      }
              catch (NumberFormatException e) {
                          System.out.println (e);
               	          //System.exit (1);
                      }
                  }
              catch (IOException e) {
                          System.out.println (e);
		          //System.exit (1);
                  }

      //Close File

      try {
            ReadFile.close ();
      }
      catch (IOException e) {
            System.out.println (e);
      }
      return ReturnValue;
   } // end of FUNCTION



   //======================================================================
   //Open a File at Client site, READ data and SEND it to the Server
   //======================================================================

   public void SendClientFile (String nameStS, String nameCtS, int SendPort,String hostName)

  {
      // OPEN the given File at Client site
      //.........................................................

      FileInputStream ReadFile = null;
         try {
            ReadFile = new FileInputStream (nameCtS);
         }
         catch (Exception e) {
                System.out.println (e);
                System.exit (1);
         }

      // Check if socket is still open
      //..........................................................
      if (!Connect (SendPort,hostName)) {
         System.out.println (" No connection to server.");
         System.exit (1);
      }

      // Check the stream
      //..........................................................
      PrintStream streamOut = null; // stream from the Client to the socket
      try {
         streamOut = new PrintStream (fs.getOutputStream());
      }
      catch (Exception e) {
         System.out.println (e);
         Disconnect();
         System.exit (1);
      }

      //SEND file name
      //.........................................................

      streamOut.println (nameStS);

      // Read Data from the given File and SEND it to the "stream"
      // so that it will go to the Server
      //...........................................................

      DataInputStream ds = new DataInputStream (ReadFile);

      while (true) {
            try {
               String s = ds.readLine (); // Read Data from the given File
               if (s == null) break;
               streamOut.println (s); // SEND it to the "streamOut"
            }
            catch (IOException e) {
               System.out.println (e);
               System.exit (1);
            }
      }

      //Close File

      try {
         ds.close ();
      }

      catch (IOException e) {
         System.out.println (e);
      }

      System.out.println(" SENT File " + nameCtS + " to the Server" + hostName + " at port : " + SendPort);
      Disconnect ();
      System.out.println(" DONE. ");

   }  // end of SendClientFile()


//=========================================================================
//      WRITE a Value to the FLAG File 
//=========================================================================

   public void WriteFlag (String FlagFileName, String FlagValue) {

   
         // Open the a FILE at Client site to WRITE
         //........................................................

         FileOutputStream wf = null;

         try {
            wf = new FileOutputStream (FlagFileName);
         }
         catch (Exception e) {
            System.out.println (e);
            System.exit (1);
         }


         // WRITE Value to the FILE 
         //........................................................

         PrintStream ds = new PrintStream (wf); // Create Output Sream to WRITE
         ds.println (FlagValue); 
      
      //Close File
      try {
         wf.close ();
      }
      catch (IOException e) {
         System.out.println (e);
      }

   }  // end of WriteFlag



//=========================================================================
//      RECEIVE a File from the Server and WRITE to a file at Client site
//=========================================================================

   public void TakeServerFile (String nameSF, String nameCF, int ReceivePort,String hostName) {

      DataInputStream streamIn = null; // stream from the Client to the socket
      PrintStream streamOut = null;

      // Check if socket is still open
      //..........................................................

      if (!Connect (ReceivePort,hostName)) {
         System.out.println (" No connection to server.");
         System.exit (1);
      }

      // Check the stream
      //..........................................................

      try {
         streamIn = new DataInputStream (fs.getInputStream());
         streamOut = new PrintStream (fs.getOutputStream());
      }

      catch (Exception e) {
         System.out.println (e);
         Disconnect();
         System.exit (1);
      }

       //SEND file name to read at Server site
      //.........................................................
      streamOut.println (nameSF);
      
         // Open the a FILE at Client site to WRITE
         //........................................................

         FileOutputStream wf = null;

         try {
            wf = new FileOutputStream (nameCF);
         }

         catch (Exception e) {
            System.out.println (e);
            System.exit (1);
         }

        // Read Data from the "streamIn" and WRITE it to the given File
        //...........................................................

         PrintStream ds = new PrintStream (wf); // Why do we need this ???

         while (true) {
            try {
               String s = streamIn.readLine ();
               if (s == null) break;
               ds.println (s); 
            }

            catch (IOException e) {
               System.out.println (e);
               break;
            }
         }

      //Close File

      try {
         wf.close ();
      }

      catch (IOException e) {
         System.out.println (e);
      }

      System.out.println (" RECEIVING data from the Server at port : " + ReceivePort + " and write it to File " + nameCF + " at port : " +ReceivePort);
      Disconnect ();
      System.out.println (" DONE.");
}

    
   /* Application entry point
    * The first command line argument is the remote host name.
    * @param args - command line arguments
    */
                                          
 public static void main (String args[]) throws FileNotFoundException{

String[] order= new String[8];
String[] accounts= new String[16];
File fi=new File("i-comAccounts.txt");
Scanner sc= new Scanner(fi);

while(sc.hasNextLine()){
 String line=sc.nextLine();
 String delims = ",";
 String[] field=line.split(delims);
//String[] accounts= new String[8];
 for (int i=0; i< field.length; i++){
accounts[i]=field[i];
System.out.println(accounts[i]);
 }
 }
if(Integer.parseInt(args[3])==0)
{
Port_to_Server=Integer.parseInt(accounts[2]);

Port_from_Server=Integer.parseInt(accounts[3]);
}
if(Integer.parseInt(args[3])==1)
{
Port_to_Server=Integer.parseInt(accounts[6]);

Port_from_Server=Integer.parseInt(accounts[7]);
}
if(Integer.parseInt(args[3])==2)
{

Port_to_Server=Integer.parseInt(accounts[10]);

Port_from_Server=Integer.parseInt(accounts[11]);
System.out.println(Port_to_Server);

}
if(Integer.parseInt(args[3])==3)
{
Port_to_Server=Integer.parseInt(accounts[14]);

Port_from_Server=Integer.parseInt(accounts[15]);
}





 

      if (args.length > 0) new Client (args[0],args[1],args[2]);
      else new Client (null,null,null);

 } 
                                         
}

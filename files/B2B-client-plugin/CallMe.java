import java.io.*;
import java.util.*;

public class CallMe{

 public static String itemid;
 

private static void printLines(String name, InputStream ins) throws Exception {
    String line = null;
    BufferedReader in = new BufferedReader(
        new InputStreamReader(ins));
    while ((line = in.readLine()) != null) {
        System.out.println(name + " " + line);
    }
  }

  private static void runProcess(String command) throws Exception {
    Process pro = Runtime.getRuntime().exec(command);
    printLines(command + " stdout:", pro.getInputStream());
    printLines(command + " stderr:", pro.getErrorStream());
    pro.waitFor();
    System.out.println(command + " exitValue() " + pro.exitValue());
  }




public static void callBank(){
try {
    
      runProcess("javac Client.java");
      runProcess("java Client o-Q-bank-f.dat o-Q-bank.dat  o-A-bank-f.dat 0");
    } catch (Exception e) {
      e.printStackTrace();
    }  
//Reading flag file Ac.dat
 try {
         BufferedReader in = new BufferedReader(new FileReader("Ac.dat"));
         String str;
          
         while ((str = in.readLine()) != null) {
		
            if(Integer.parseInt(str)==0){ 
			 
			callShip();
			
		      }
		else{
                        
			writeFlag("Ac.dat","1 , "+itemid);
			
		    }
         }
      } catch (IOException e) {
      }
   
       
}

//call ship
public static void callShip(){
try {
      runProcess("javac Client.java");
      runProcess("java Client o-Q-ship-f.dat o-Q-ship.dat  o-A-ship-f.dat 1");
    } catch (Exception e) {
      e.printStackTrace();
    }  
//Reading flag file Ac.dat
 try {
         BufferedReader in = new BufferedReader(new FileReader("Ac.dat"));
         String str;
         
         while ((str = in.readLine()) != null) {
		
            if(Integer.parseInt(str)==0){ 
			
			callMayor();

		      }
		else{
			writeFlag("Ac.dat","2  , "+itemid);
			
		    }
         }
      } catch (IOException e) {
      }
   
       
}

//call  mayor
public static void callMayor(){
try {
      runProcess("javac Client.java");
      runProcess("java Client o-Q-mayor-f.dat o-Q-mayor.dat  o-A-mayor-f.dat 2");
    } catch (Exception e) {
      e.printStackTrace();
    }  
//Reading flag file Ac.dat
 try {
         BufferedReader in = new BufferedReader(new FileReader("Ac.dat"));
         String str;
         
         while ((str = in.readLine()) != null) {
		
            if(Integer.parseInt(str)==0){ 
			
			callIt();

		      }
		else{
			writeFlag("Ac.dat","3 , "+itemid);
			
		    }
         }
      } catch (IOException e) {
      }
   
       
}

//call  it
public static void callIt(){
try {
       runProcess("javac Client.java");
      runProcess("java Client o-Q-it-f.dat o-Q-it.dat  o-A-it-f.dat 3");
    } catch (Exception e) {
      e.printStackTrace();
    }  
//Reading flag file Ac.dat
 try {
         BufferedReader in = new BufferedReader(new FileReader("Ac.dat"));
         String str;
         
         while ((str = in.readLine()) != null) {
		
            if(Integer.parseInt(str)==0){ 
			
			writeFlag("Ac.dat","0,Order Placed");

		      }
		else{
			writeFlag("Ac.dat","4 , "+itemid);
			
		    }
         }
      } catch (IOException e) {
      }
   
       
}

//Write Ac
 public static void writeFlag(String flagFile,String flagValue){
 //System.out.println(flagFile+","+flagValue);
 

try {
         BufferedWriter out = new BufferedWriter(new FileWriter(flagFile));
          
            out.write(flagValue);
        

        
         out.close();
		writeFlag1("callMe-f.dat","0");
          System.exit(0); 
         
      }
      catch (IOException e) {
      }


}




//Write Flag 
 public static void writeFlag1(String flagFile,String flagValue){
 //System.out.println(flagFile+","+flagValue);
 

try {
         BufferedWriter out = new BufferedWriter(new FileWriter(flagFile));
          
            out.write(flagValue);
        

        
         out.close();
        
      }
      catch (IOException e) {
      }


}


public static void main(String[] args ) throws FileNotFoundException{





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

 }
 }
File f2=new File("i-Q-order.txt");
Scanner sc2= new Scanner(f2);

while(sc2.hasNextLine()){
 String line=sc2.nextLine();
 String delims = ",";
 String[] field=line.split(delims);
//String[] order= new String[8];
 for (int i=0; i< field.length; i++){
order[i]=field[i];

 }
 }
itemid=order[0];



//Reading flag file callMe-f.dat
 try {
         BufferedReader in = new BufferedReader(new FileReader("callMe-f.dat"));
         String str;
         
         while ((str = in.readLine()) != null) {
		
            if(str.equals("0")){ 
			writeFlag1("callMe-f.dat","1");
			Read.main(args);
			 
			callBank();
			writeFlag1("callMe-f.dat","0");

		      }
         }
      } catch (IOException e) {
      }



}





}


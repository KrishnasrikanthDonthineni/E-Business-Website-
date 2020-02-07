import java.io.*;
import java.util.*;


public class Read{
public static void main(String[] args) throws FileNotFoundException {
//ArrayList<Read> pList=new ArrayList<Read>();
String[] order= new String[8];
String[] accounts= new String[16];
File f=new File("i-comAccounts.txt");
Scanner sc= new Scanner(f);

while(sc.hasNextLine()){
 String line=sc.nextLine();
 String delims = ",";
 String[] field=line.split(delims);
//String[] accounts= new String[8];
 for (int i=0; i< field.length; i++){
accounts[i]=field[i];
//System.out.println(accounts[i]);
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
//System.out.println(order[i]);
 }
 }

// Writing into the bank file o-Q-bank.dat
 try {
         BufferedWriter out = new BufferedWriter(new FileWriter("o-Q-bank.dat"));
          
            out.write(order[0]+","+order[4]+","+order[5]+","+accounts[0]+","+accounts[1]);
        

        
         out.close();
         
      }
      catch (IOException e) {
      }


// Writing into the ship file o-Q-ship.dat
 try {
         BufferedWriter out = new BufferedWriter(new FileWriter("o-Q-ship.dat"));
          
            out.write(order[0]+","+order[2]+","+order[3]+","+order[6]+","+order[7]+","+accounts[4]+","+accounts[5]);
        

        
         out.close();
        
      }
      catch (IOException e) {
      }

// Writing into the Mayor file o-Q-mayor.dat
 try {
         BufferedWriter out = new BufferedWriter(new FileWriter("o-Q-mayor.dat"));
          
            out.write(order[0]+","+order[4]+","+order[5]+","+accounts[8]+","+accounts[9]);
        

        
         out.close();
        
      }
      catch (IOException e) {
      }



// Writing into the IT file o-Q-it.dat
 try {
         BufferedWriter out = new BufferedWriter(new FileWriter("o-Q-it.dat"));
          
            out.write(order[0]+","+order[2]+","+order[3]+","+order[4]+","+order[5]+","+order[6]+","+order[7]+","+accounts[12]+","+accounts[13]);
        

        
         out.close();
         
      }
      catch (IOException e) {
      }


 }

 }
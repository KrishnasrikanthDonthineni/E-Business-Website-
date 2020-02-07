// To CONNECT to a MySQL Database & to INSERT a new row

//.......................................................

 

import java.io.*;

import java.sql.*;

import java.util.*;

 

public class TextToDatabaseTable {

private static final String DB = "b_f19_03_db",

TABLE_NAME = "User",

HOST = "jdbc:mysq://zodiac.cs.newpaltz.edu:3306/",

ACCOUNT = "b_f19_03",

PASSWORD = "gg57u4",

DRIVER = "org.gjt.mm.mysql.Driver",

FILENAME = "records.txt";

 

public static void main (String[] args) {

try {

 

// connect to db

Properties props = new Properties();

props.setProperty("user", ACCOUNT);

props.setProperty("password", PASSWORD);

 

Class.forName(DRIVER).newInstance();

Connection con = DriverManager.getConnection(

HOST + DB, props);

Statement stmt = con.createStatement();

 

// open text file

BufferedReader in = new BufferedReader(

new FileReader(FILENAME));

 

// read and parse a line

String line = in.readLine();

while(line != null) {

 

StringTokenizer tk = new StringTokenizer(line);

String userid = tk.nextToken(),

Name = tk.nextToken();

//uname = tk.nextToken(),

//rname = tk.nextToken(),

//email = tk.nextToken();

 

// execute SQL insert statement

String query = "INSERT INTO " + TABLE_NAME;

query += " VALUES(" + quote(userid) + ",";

query += quote(Name) + ");";

//query += quote(uname) + ",";

//query += quote(rname) + ",";

//query += quote(email) + ");";

stmt.executeQuery(query);

 

// prepare to process next line

line = in.readLine();

}

in.close();

}

 

catch( Exception e) {

e.printStackTrace();

}

}

 

// protect data with quotes

private static String quote(String include) {

return("\"" + include + "\"");

}

}
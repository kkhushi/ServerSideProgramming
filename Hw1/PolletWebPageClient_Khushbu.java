import java.net.Socket;
import java.net.InetAddress;

import java.io.PrintWriter;
import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.io.IOException;

/**
 * Web Page Client to access www.cs.sjsu.edu/faculty/pollett/somepath
 * where somepath is input commandline argument. 
 */
public class PolletWebPageClient {
    
    /**
     * Command-line interface.   
     * @param args somepath
     */
    public static void main(String[] args) {
        if (args.length == 0) {
            System.out.println("Specify some path: java PollettWebPageClient some_path");
            System.exit(0);  
        } else {
            String path = args[0];
            getHTTPResponse(path);
        }
    }

    /**
     * Prints on command line HTTP Response for the GET request made to host : www.cs.sjsu.edu
     * for /faculty/pollett/ and appends the path, specified as input param
     * @param  path  a relative path to a web page on www.cs.sjsu.edu/faculty/pollett/
     */
    public static void getHTTPResponse(String path) {
        try {
            Socket s = new Socket(InetAddress.getByName("www.cs.sjsu.edu"), 80);
            
            PrintWriter pw = new PrintWriter(s.getOutputStream());
            pw.println("GET /faculty/pollett/"+ path + " HTTP/1.1");
            pw.println("Host: www.cs.sjsu.edu");
            pw.println("");
            pw.flush();
            
            BufferedReader br = new BufferedReader(new InputStreamReader(s.getInputStream()));
            String line = null;
            while((line = br.readLine()) != null) System.out.println(line);
            br.close();
        
        } catch (IOException e) {
            System.out.println("Error in Stream Reader/Writer:");
            e.printStackTrace();
        }
    }
}
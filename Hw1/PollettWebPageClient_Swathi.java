import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.PrintWriter;
import java.net.InetSocketAddress;
import java.net.Socket;
import java.net.UnknownHostException;
public class PollettWebPageClient {
	public static void main(String[] args) throws IOException {
		Socket s = new Socket();
		String host = "www.cs.sjsu.edu";
		 String file=args[0];
		
	     try
	     {
	     s.connect(new InetSocketAddress(host , 80));
	    
	     }
	      
	     //Host not found
	     catch (UnknownHostException e) 
	     {
	         System.err.println("Don't know about host : " + host);
	         System.exit(1);
	     }
	     
	     PrintWriter pw = new PrintWriter(s.getOutputStream());
	     pw.println("GET "+file+" HTTP/1.1");
         pw.println();
	     pw.print("Host: cs.sjsu.edu");
	     pw.flush();
         System.out.println("Sending request");
         System.out.println("Request sent");
         BufferedReader in = new BufferedReader(new InputStreamReader(s.getInputStream()));
         System.out.println("Receiving response");
         String line;
         while ((line = in.readLine()) != null)
             System.out.println(line);
         System.out.println("Received response");
         if (line == null)
             System.exit(0);
	    
	}
	
}


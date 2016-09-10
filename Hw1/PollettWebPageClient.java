import java.net.Socket;
import java.io.BufferedWriter;
import java.io.BufferedReader;
import java.io.OutputStreamWriter;
import java.io.InputStreamReader;

/**
* PollettWebPageClient is a program that uses the HTTP GET request to make a request
* for a specific webpage using java sockets which establish connection to the website.
* The program processes the returned results and displays them.
*
*/

public class PollettWebPageClient{

    public static void main(String args[]) {

        String host="www.cs.sjsu.edu"; //Root website
        int port=80; //Webserver listening on port 80
        String path; //Relative path from the root. This is the exact page that is requested to be fetched
        String requeststring=null; //HTTP GET request to request the path
        BufferedWriter writer=null;
        BufferedReader reader=null;

        try {
                //Get the value of some_path
                if(args.length == 0) {
                    System.out.println("The syntax is java PollettWebPageClient <some_path>");
                    System.exit(0);
                }
                else {
                    path=args[0].toString();
                    requeststring="GET /faculty/pollett/"+path+" HTTP/1.1\r\n"+"Host: "+host+"\r\n\r\n";
                }

                //Create connection to www.cs.sjsu.edu on port 80
                Socket socket=new Socket(host,port);

                /* Input and output handles are defined. Object of Socket class is used to get the InputStream and
                OutputStream handles.*/

                writer=new BufferedWriter(new OutputStreamWriter(socket.getOutputStream()));
                reader= new BufferedReader(new InputStreamReader(socket.getInputStream()));


                sendrequest(writer,requeststring); //Send HTTP GET request

                displayresponse(reader); //Display response

        } catch(Exception e) {
            e.printStackTrace();

        } finally {
            if(reader!=null) {
                try {
                    reader.close();
                } catch (Exception ex) {
                    ex.printStackTrace();
                }
            }
            if(writer!=null) {
                try {
                    writer.close();
                } catch (Exception ex) {
                    ex.printStackTrace();
                }
            }
        }
    }

    /**
    * Uses the write handle to write the HTTP GET request onto the OutputStream. This is akin to connecting to the website
    * using telnet (eg. telnet www.cs.sjsu.edu 80) and then typing the HTTP GET request.
    * @param w              Handle to the OutputStream obtained from the socket which connects to the website.
    * @param requeststring  The exact HTTP GET request.
    *
    */
    public static void sendrequest(BufferedWriter writer,String requeststring) throws Exception {
        writer.write(requeststring);
        writer.flush();
    }


    /**
    * Uses the read handle to read the returned response from the webserver.
    * Each line of the response is parsed and displayed to the user.
    * @param    r   Handle to the InputStream obtained from the socket which connects to the website.
    *
    */
    public static void displayresponse(BufferedReader reader) throws Exception {
        String line;
        while((line=reader.readLine()) !=null)
            System.out.println(line);
    }
}
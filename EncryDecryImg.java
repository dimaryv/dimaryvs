import java.io.*;
import java.nio.file.Files;
import java.nio.file.Paths;


public class EncryDecryImg {
        public static void main(String args[]){
            try{
                File outfile = new File("src/pictures/encrypted_img18.jpg");
                FileOutputStream fos = new FileOutputStream(outfile);

                byte[] ByteFileArray = Files.readAllBytes(Paths.get("src/pictures/img18.jpg.encrypted"));
                byte[] ByteKeyArray = "qwerty".getBytes();

                for(int i = 0; i < ByteFileArray.length; i++) {
                    fos.write(ByteFileArray[i] ^ ByteKeyArray[i % ByteKeyArray.length]);
                }
            }
            catch(IOException e){
                System.err.println(e.toString());
            }
        }
}

import java.io.*;
import java.nio.file.Files;
import java.nio.file.Paths;
import java.util.Scanner;


public class Main {
        public static void main(String args[]){

            Scanner scan = new Scanner(System.in);
            System.out.print("Variant: ");

            StringBuilder Var = new StringBuilder(scan.nextLine());
            if(Var.length() == 1)
            {
                Var.insert(0, 0);
            }
            else if(Var.length() > 2 || Var.length() < 0){
                System.out.print("No matches.Try Again.");
                return;
            }
            try{
                File outfile = new File("src/pictures/encrypted_img"+ Var +".jpg");
                FileOutputStream fos = new FileOutputStream(outfile);

                byte[] ByteFileArray = Files.readAllBytes(Paths.get("src/pictures/img"+ Var +".jpg.encrypted"));
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

import java.io.*;
import java.nio.file.Files;
import java.nio.file.Paths;
import java.util.Scanner;


public class EncryDecryImg {
        public static void main(String args[]){

            Scanner scan = new Scanner(System.in);
            System.out.print("Variant: ");

            StringBuffer Var = new StringBuffer(scan.nextLine());
            if(Var.length() == 1) {
                if(Var.toString().matches("\\D")) {
                    System.out.print("No matches.Try Again.");
                    return;
                }
                Var.insert(0, 0);
            }
            else if(Var.length() > 2 || Var.length() < 0 ||
                    Var.toString().matches("\\D(.*)") ||
                    Var.toString().matches("(.*)\\D") || Var.toString().matches("[3-9](.*)")){
                System.out.print("No matches.Try Again.");
                return;
            }
            try{
                File outfile = new File("src/pictures/encrypted_img"+ Var +".jpg");
                FileOutputStream fos = new FileOutputStream(outfile);

                byte[] ByteFileArray = Files.readAllBytes(Paths.get("src/pictures/img"+ Var +".jpg.encrypted"));
                byte[] ByteKeyArray = "qwerty".getBytes();

                double a = Math.round(0.03 * ByteFileArray.length);
                System.out.println("Proccesing...");
                int counter = 0;
                System.out.print("|");
                for(int i = 0; i < ByteFileArray.length; i++) {
                    fos.write(ByteFileArray[i] ^ ByteKeyArray[i % ByteKeyArray.length]);
                    if(counter == i){
                        System.out.print("=");
                        counter += a;
                    }
                }
                System.out.print("| \n Done!");
            }
            catch(IOException e){
                System.err.println(e.toString());
            }
        }
}

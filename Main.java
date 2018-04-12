import java.util.Scanner;

public class Main
{
    public static void pRec(int[] mascoef, double x)
    {
        float p = 0;
        for(int i = 0; i < mascoef.length; i++)
        {
            p *= x;
            p += mascoef[i];
        }
        System.out.print("\n The sum of the polynomial at a value of " + x + " equals: "+ p);
    }
    public static void main(String[] args)
    {
        Scanner scan = new Scanner(System.in);

        System.out.print("\n" + "Enter an argument: ");
        double x = scan.nextDouble();

        System.out.print("Enter the degree of the polynomial: ");
        int a = scan.nextInt();
        a++;

        System.out.print("Choice(1 - random, 2-handle): ");
        int choice;
        choice = scan.nextInt();

        int[] mascoef = new int[a];

        switch (choice){
            case 1: {
                int min = 0;
                int max = 10;
                mascoef = new int[a];
                System.out.print("Polynomial: ");
                for (int i = 0; i < mascoef.length; i++) {
                    mascoef[i] = (int) (min + Math.random() * max);
                    System.out.print(mascoef[i] + "x^" + (a-i-1) + " ");
                }
                pRec(mascoef, x);
                break;
            }
            case 2:
            {
                System.out.print("Enter coefs: ");
                for(int i = 0; i < a; i++) {
                    int q = scan.nextInt();
                    mascoef[i] = q;
                }
                for(int i = 0; i < mascoef.length; i++) {
                    System.out.print(mascoef[i] + "x^" + (a-i-1) + " ");
                }
                pRec(mascoef, x);
                break;
            }
            default: {
                System.out.print("Don't know this command. Try again.");
                break;
            }
        }
    }
}

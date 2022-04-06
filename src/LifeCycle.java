import java.applet.Applet;
 import java.awt.Graphics;
 
 public class LifeCycle extends Applet
 {
   public LifeCycle()
   {
     System.out.println("Constructor running...");
   }
   public void init()
   {
     System.out.println("This is init.");
   }
   public void start()
   {
     System.out.println("Applet started.");
   }
   public void paint(Graphics theGraphics)
   {
     theGraphics.drawString("Hello, World!", 0, 50);
     System.out.println("Applet just painted.");
   }
   public void stop()
   {
     System.out.println("Applet stopped.");
   }
   public void destroy()
   {
     System.out.println("Applet destroyed.");
   }
public static void main (String Args[])
{
System.out.println("Lehi");

}
 }







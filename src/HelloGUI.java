import java.awt.*;
public class HelloGUI extends Frame 
{
  private static Font f;
  private void drawCenteredString (Graphics g, String s)
  {
    Dimension d = getSize();
    FontMetrics fm=getFontMetrics(f);
    int x=(d.width-fm.stringWidth(s))/2;
    int y=d.height-((d.height-fm.getHeight())/2);
    g.drawString(s,x,y);
  }
 
  public void paint(Graphics g) 
  {
    g.setFont(f);
    g.setColor(Color.red);
    drawCenteredString(g,"Hello in a window!");
	System.out.println("just painted");
  }
  
  public static void main(String[] args)
  {
    Frame theFrame = new HelloGUI();
    theFrame.setTitle ("Java Hello World!");
    theFrame.setSize (250,100);
    f=new Font("Helvetica",Font.BOLD, 24);
    theFrame.show();
  }
}




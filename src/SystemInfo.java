import java.applet.Applet;
import java.awt.Panel;
import java.awt.GridLayout;
import java.awt.BorderLayout;
import java.awt.CardLayout;
import java.awt.Label;
import java.awt.Button;
import java.awt.Font;
import java.awt.TextField;
import java.awt.Dimension;
import java.awt.event.ActionListener;
import java.awt.event.ActionEvent;

class LabelField extends Panel {
  int fLabelWidth;
  Label fLabel;
  TextField fField;

  public LabelField(int theLabelWidth, String theLabel, String theValue) {
    this.fLabelWidth = theLabelWidth;
    add(this.fLabel = new Label(theLabel));
    add(this.fField = new TextField(theValue));
    fField.setEditable(false);
  }
  public void doLayout() {
    Dimension theDimension = getSize();
    Dimension theLabelSize = fLabel.getPreferredSize();
    Dimension theFieldSize = fField.getPreferredSize();
    fLabel.setBounds(0, 0, fLabelWidth, theLabelSize.height);
    fField.setBounds(fLabelWidth + 5, 0, theDimension.width - (fLabelWidth + 5), 
      theFieldSize.height);
  }
}

public class SystemInfo extends Applet {
  CardLayout fCardLayout;
  Panel fPanel;
  Button fNextButton;
  Button fPrevButton;

  public void init() {
  Font theFont = new Font("Helvetica", Font.BOLD, 14);
  setLayout(new BorderLayout());
  add("South", fPanel = new Panel());

  fNextButton = new Button("Next");
  fPrevButton = new Button("Previous");
  ButtonAction aButtonAction = new ButtonAction();

  fNextButton.addActionListener(aButtonAction);
  fPrevButton.addActionListener(aButtonAction);

  fPanel.add(fPrevButton);
  fPanel.add(fNextButton);

  add("Center", fPanel = new Panel());
  fPanel.setLayout(fCardLayout = new CardLayout());

  try {
    Panel aPanel = new Panel();
    aPanel.setLayout(new GridLayout(0, 1));
    aPanel.add(new Label("System Properties")).setFont(theFont);
    aPanel.add(new LabelField(100, "version:",
      System.getProperty("java.version")));
    aPanel.add(new LabelField(100, "vendor:",     System.getProperty("java.vendor")));
    aPanel.add(new LabelField(100, "vendor.url:", System.getProperty("java.vendor.url")));
    fPanel.add("system", aPanel);

    aPanel = new Panel();
    aPanel.add(new Label("Java Properties")).setFont(theFont);
    aPanel.setLayout(new GridLayout(0, 1));
    aPanel.add(new LabelField(100, "class version:",           
      System.getProperty("java.class.version")));
    fPanel.add("java", aPanel);

    aPanel = new Panel();
    aPanel.setLayout(new GridLayout(0, 1));
    aPanel.add(new Label("OS Properties")).setFont(theFont);
    aPanel.add(new LabelField(100, "OS:",System.getProperty("os.name")));
    aPanel.add(new LabelField(100, "OS Arch:",System.getProperty("os.arch")));
    aPanel.add(new LabelField(100, "OS Version:",System.getProperty("os.version")));
    fPanel.add("os", aPanel);

    aPanel = new Panel();
    aPanel.setLayout(new GridLayout(0, 1));
    aPanel.add(new Label("Misc Properties")).setFont(theFont);
    aPanel.add(new LabelField(100, "File Separator:",    
      System.getProperty("file.separator")));
    aPanel.add(new LabelField(100, "Path Separator:",     
      System.getProperty("path.separator")));
    aPanel.add(new LabelField(100, "Line Separator:", 
      System.getProperty("line.separator")));
    fPanel.add("sep", aPanel);
  } catch (SecurityException e) {
      System.out.println("Security Exception: " + e);
    }
  }

  class ButtonAction implements ActionListener {

    public void actionPerformed (ActionEvent theEvent) {
      Object anObject = theEvent.getSource();
      if (anObject == fNextButton)
        fCardLayout.next(fPanel);
      else if (anObject == fPrevButton)
        fCardLayout.previous(fPanel);
    }
  }
}






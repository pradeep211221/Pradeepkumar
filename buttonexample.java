import java.awt.*;
import java.lang.*;
import java.io.*;
public class buttonexample{
    public static void main(String[] args){
        Frame frame = new Frame("this is a sample frame", null);
        Button  b =new Button("addition");
        Button s=new Button("subtraction");
        Button d=new Button("division");
        b.setBounds(50, 50, 100, 100);
        s.setBounds(80, 50, 100, 100);
        d.setBounds(70, 50, 100, 100);
	//frame.resize(200,200);
        frame.setBackground(Color.blue);
        frame.add(b);
        frame.add(s);
        frame.add(d);
        //frame.setLayout(new GridLayout(3x3));
        frame.setVisible(true);
    }
}
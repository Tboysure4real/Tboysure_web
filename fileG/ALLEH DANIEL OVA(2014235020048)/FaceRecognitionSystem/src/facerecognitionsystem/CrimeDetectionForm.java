/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package facerecognitionsystem;

import java.awt.Image;
import java.io.File;
import javax.swing.ImageIcon;
import javax.swing.JFileChooser;
import org.opencv.core.Core;

/**
 *
 * @author USER
 */
public class CrimeDetectionForm extends javax.swing.JFrame {

    /**
     * Creates new form CrimeDetectionForm
     */
    public CrimeDetectionForm() {
        initComponents();
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jPanel1 = new javax.swing.JPanel();
        jLabel1 = new javax.swing.JLabel();
        lblImg = new javax.swing.JButton();
        lblImg2 = new javax.swing.JLabel();
        btnCamera = new javax.swing.JButton();
        btnTest = new javax.swing.JButton();
        btnRetun = new javax.swing.JButton();
        jButton1 = new javax.swing.JButton();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);

        jPanel1.setName("Crime"); // NOI18N
        jPanel1.setLayout(null);

        jLabel1.setIcon(new javax.swing.ImageIcon("C:\\Users\\Tboysure\\Desktop\\OJO JOHN TAIWO(2010245020178)\\FaceRecognitionSystem\\Images\\IB-Poly.jpeg")); // NOI18N
        jPanel1.add(jLabel1);
        jLabel1.setBounds(10, -20, 650, 410);

        lblImg.setFont(new java.awt.Font("Tahoma", 1, 11)); // NOI18N
        lblImg.setText("Input Image");
        lblImg.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                lblImgActionPerformed(evt);
            }
        });
        jPanel1.add(lblImg);
        lblImg.setBounds(770, 210, 100, 23);
        jPanel1.add(lblImg2);
        lblImg2.setBounds(740, 30, 180, 180);

        btnCamera.setBackground(new java.awt.Color(0, 102, 102));
        btnCamera.setFont(new java.awt.Font("Tahoma", 1, 11)); // NOI18N
        btnCamera.setForeground(new java.awt.Color(102, 0, 0));
        btnCamera.setText("CAMERA");
        btnCamera.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnCameraActionPerformed(evt);
            }
        });
        jPanel1.add(btnCamera);
        btnCamera.setBounds(760, 310, 150, 23);

        btnTest.setFont(new java.awt.Font("Tahoma", 1, 11)); // NOI18N
        btnTest.setForeground(new java.awt.Color(0, 102, 204));
        btnTest.setText("Detect");
        btnTest.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnTestActionPerformed(evt);
            }
        });
        jPanel1.add(btnTest);
        btnTest.setBounds(770, 280, 120, 23);

        btnRetun.setFont(new java.awt.Font("Tahoma", 1, 11)); // NOI18N
        btnRetun.setText("return");
        btnRetun.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnRetunActionPerformed(evt);
            }
        });
        jPanel1.add(btnRetun);
        btnRetun.setBounds(860, 0, 70, 20);

        jButton1.setFont(new java.awt.Font("Tahoma", 1, 11)); // NOI18N
        jButton1.setForeground(new java.awt.Color(0, 102, 102));
        jButton1.setText("Recognise");
        jPanel1.add(jButton1);
        jButton1.setBounds(780, 240, 90, 20);

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addComponent(jPanel1, javax.swing.GroupLayout.PREFERRED_SIZE, 923, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(0, 0, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jPanel1, javax.swing.GroupLayout.PREFERRED_SIZE, 374, javax.swing.GroupLayout.PREFERRED_SIZE)
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void lblImgActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_lblImgActionPerformed
        JFileChooser chooser = new JFileChooser();
        chooser.showOpenDialog(null);
        File f = chooser.getSelectedFile();
        String filename = f.getAbsolutePath();
        //txtImg.setText(filename);
        Image getAbsoluthPath = null;
        ImageIcon icon = new ImageIcon(filename);
        Image image = icon.getImage().getScaledInstance(lblImg2.getWidth(), lblImg2.getHeight(), Image.SCALE_SMOOTH);
        lblImg2.setIcon(icon);
    }//GEN-LAST:event_lblImgActionPerformed

    private void btnCameraActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnCameraActionPerformed
       System.loadLibrary(Core.NATIVE_LIBRARY_NAME);
        this.dispose();
        new RealTimeFaceDetection().setVisible(true);

    }//GEN-LAST:event_btnCameraActionPerformed

    private void btnTestActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnTestActionPerformed
       System.loadLibrary(Core.NATIVE_LIBRARY_NAME);
        this.dispose();
        new FaceDetection().setVisible(true);
    }//GEN-LAST:event_btnTestActionPerformed

    private void btnRetunActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnRetunActionPerformed
       this.dispose();
       new MenuForm().setVisible(true);
    }//GEN-LAST:event_btnRetunActionPerformed

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(CrimeDetectionForm.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(CrimeDetectionForm.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(CrimeDetectionForm.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(CrimeDetectionForm.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                 new RealTimeFaceDetection().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btnCamera;
    private javax.swing.JButton btnRetun;
    private javax.swing.JButton btnTest;
    private javax.swing.JButton jButton1;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JButton lblImg;
    private javax.swing.JLabel lblImg2;
    // End of variables declaration//GEN-END:variables
}

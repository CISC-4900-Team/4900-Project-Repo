CREATE TABLE Medication
(
    Medication_ID int PRIMARY KEY,
    Medication_Name Varchar (255),
    Company_Name Varchar (255),
    Company_Address Varchar (255),
    Company_Phone_Number Varchar (255),
    MSRP varchar(255),
    Potency Varchar (255),
    Side_Effects Varchar (255),
    Descriptions Varchar (255)
);

CREATE TABLE Insurance
(
    Insurance_ID int PRIMARY KEY, 
    Insurance_Name Varchar (255),
    Policy_Number int,
    Deductible Varchar (255),
    Date_Issued Date
);

CREATE TABLE Patients
(
    Patient_ID int PRIMARY KEY,
    F_Name Varchar (255),
    L_Name Varchar (255),
    Address Varchar (255),
    DOB DATE NOT NULL,
    Phone_Number Varchar (255),
    SEX Varchar (255),
    Allergies Varchar (255),
    Medication_ID int,
    Insurance_ID int,
    FOREIGN KEY(Medication_ID) REFERENCES Medication (Medication_ID),
    FOREIGN KEY(Insurance_ID) REFERENCES Insurance (Insurance_ID)
);

CREATE TABLE Prescription
(
    Prescription_ID int PRIMARY KEY,
    Doctor_Name Varchar (255),
    Doctor_Phone_Number Varchar (255),
    Doctor_Office_Address Varchar (255),
    Num_pills Int,
    Refill_Count Int,
    Date_Issued Date,
    Med_Usage Varchar (255),
    Expiration Date,
    Med_Description Varchar (255),
    Patient_ID int,
    Medication_ID int,
    FOREIGN KEY(Patient_ID) REFERENCES Patients (Patient_ID),
    FOREIGN KEY(Medication_ID) REFERENCES Medication (Medication_ID)
);

CREATE TABLE Coupons
(
    Coupon_ID int PRIMARY KEY, 
    Coupon_Desc Varchar (255),
    Exp_Date Date
);

CREATE TABLE Payment
(
    Payment_ID int PRIMARY KEY, 
    Total_Cost Varchar (255),
    Stored_Payment Varchar (255),
    Payment_Type Varchar (255),
    Payment_Date DATETIME,
    Patient_ID int,
    Insurance_ID int,
    Coupon_ID int,
    FOREIGN KEY(Patient_ID) REFERENCES Patients (Patient_ID),
    FOREIGN KEY(Insurance_ID) REFERENCES Insurance (Insurance_ID),
    FOREIGN KEY(Coupon_ID) REFERENCES Coupons (Coupon_ID)
);

CREATE TABLE Transactions
(
    Trans_ID int PRIMARY KEY, 
    Patient_ID int,
    Payment_ID int,
    Medication_ID int,
    FOREIGN KEY(Patient_ID) REFERENCES Patients (Patient_ID),
    FOREIGN KEY(Payment_ID) REFERENCES Payment (Payment_ID),
    FOREIGN KEY(Medication_ID) REFERENCES Medication (Medication_ID)
);

CREATE TABLE Inventory
(
    Inventory_ID int PRIMARY KEY, 
    Total_Stock Varchar (255),
    Order_Date Date,
    Order_Invoice Varchar (255),
    Medication_ID int,
    FOREIGN KEY(Medication_ID)REFERENCES Medication (Medication_ID)
);

CREATE TABLE Administrator 
(
    Admin_ID int PRIMARY KEY, 
    Admin_Password Varchar (255),
    Admin_Job_Title Varchar (255),
    Creation_Date DATETIME	
);





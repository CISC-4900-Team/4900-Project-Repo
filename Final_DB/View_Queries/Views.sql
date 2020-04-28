-- _____View to see patient primary location____
-- Select pharm_name,pharm_addr,pharm_phone_number1 as 'Pharmacy Phone Number',patient_id,patient_Name
-- from Pharmacies 
-- left join Patients
-- on Pharmacies.pharm_id = Patients.pharm_id
-- ORDER BY pharm_addr

-- ___View to see Patient Payment Transactions____
-- Select patient_Name,Medication_Name,prescription_id as 'Prescription Number',MSRP as 'Cost per medication',IFNULL(Stored_payment, "Cash") as 'Payment'
-- from Patients
-- left join Medication
-- on Patients.medication_id = Medication.medication_id
-- left join Payment
-- on Patients.Patient_id = Payment.patient_id
-- left join prescription
-- on prescription.Patient_id = Patients.Patient_id
-- ORDER BY patient_Name

-- ___view to see all employees at a specific loctaion____
-- select emp_id as 'Employee ID',emp_name as 'Worker',pharm_name as 'Pharmacy',pharm_addr as 'Store Location'
-- from employee
-- left join Pharmacies
-- on employee.pharm_id = Pharmacies.pharm_id
-- where pharm_addr = '11902 Rockaway Blvd'
-- ORDER BY pharm_addr

-- ___View to see all patients with a specific allergies___ 
-- select Patient_ID as 'ID',patient_Name as 'Patient Name',pharm_name as 'Primary Pharmacy',pharm_addr as 'Address' ,Allergies, Medication_Name as 'Drug'
-- from Patients
-- left join Medication
-- on Patients.Medication_ID = Medication.Medication_ID
-- left join Pharmacies
-- on Patients.pharm_id = Pharmacies.pharm_id
-- where Allergies = 'Aspirin'

-- ___view to see all patients that live in Brooklyn___
-- select Patient_ID as 'ID',patient_Name as 'Patient Name',Address 
-- from Patients
-- where Address like '%Brooklyn%'

-- ___view to see all Male patients at a specific location___
-- select Patient_ID as 'ID',patient_Name as 'Patient Name',Address,pharm_name as 'Pharmacy',pharm_addr as 'Store Location'
-- from Patients
-- left join Pharmacies
-- on Patients.pharm_id = Pharmacies.pharm_id
-- where sex like '%M%' and Address like '%Brooklyn%'

-- ___view to see all Female patients at a specific location___
-- select Patient_ID as 'ID',patient_Name as 'Patient Name',Address,pharm_name as 'Pharmacy',pharm_addr as 'Store Location'
-- from Patients
-- left join Pharmacies
-- on Patients.pharm_id = Pharmacies.pharm_id
-- where sex like '%F%' and Address like '%Bronx%'

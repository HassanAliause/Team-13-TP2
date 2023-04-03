@Repository
public interface AdminRepository extends JpaRepository<Admin, Long> {
    
    Optional<Admin> findById(Long id);
    
}
